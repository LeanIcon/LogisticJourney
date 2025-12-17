#!/usr/bin/env bash
set -e

# ==============================================================
# deploy.sh — Production Baseline
# Zero-downtime, rollback-safe
# ==============================================================

APP_NAME="logisticjourney"
APP_DIR="/var/www/${APP_NAME}"
LOCK_FILE="$APP_DIR/.deploy.lock"
PREV_SHA_FILE="$APP_DIR/.deploy.prev"

cd "$APP_DIR"

# --------------------------------------------------
# Deploy lock (prevent concurrent deploys)
# --------------------------------------------------
if [ -f "$LOCK_FILE" ]; then
  echo "❌ Deploy already in progress"
  exit 1
fi

echo $$ > "$LOCK_FILE"

rollback() {
  echo "⚠️ Deploy failed — rolling back"
  if [ -f "$PREV_SHA_FILE" ]; then
    git reset --hard "$(cat "$PREV_SHA_FILE")" || true
    php artisan optimize:clear || true
  fi
  rm -f "$LOCK_FILE"
}

trap rollback ERR

# --------------------------------------------------
# Record current revision
# --------------------------------------------------
git rev-parse HEAD > "$PREV_SHA_FILE" || true

# --------------------------------------------------
# Pull latest code (SSH remote required)
# --------------------------------------------------
echo "📥 Updating code"
git fetch origin staging
git reset --hard origin/staging

# --------------------------------------------------
# Dependencies & build
# --------------------------------------------------
echo "📦 Composer"
composer install --no-dev --prefer-dist --optimize-autoloader

echo "📦 Frontend build"
npm ci && npm run build

# --------------------------------------------------
# Database
# --------------------------------------------------
echo "🗃️ Migrations"
php artisan migrate --force

# --------------------------------------------------
# Laravel optimization
# --------------------------------------------------
echo "⚡ Optimizing"
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# --------------------------------------------------
# Queue worker (optional)
# --------------------------------------------------
if [ -f "$APP_DIR/scripts/ensure-worker.sh" ]; then
  echo "👷 Queue worker"
  sudo "$APP_DIR/scripts/ensure-worker.sh"
else
  echo "ℹ️ No queue worker script present"
fi

# --------------------------------------------------
# PHP-FPM tuning (optional)
# --------------------------------------------------
if [ -f "$APP_DIR/scripts/php-fpm.sh" ]; then
  echo "🔧 PHP-FPM tuning"
  sudo "$APP_DIR/scripts/php-fpm.sh"
fi

# --------------------------------------------------
# Reload services (no restart)
# --------------------------------------------------
echo "🔄 Reloading services"
sudo nginx -t && sudo systemctl reload nginx
sudo systemctl reload "php$(php -r 'echo PHP_MAJOR_VERSION.".".PHP_MINOR_VERSION;')-fpm"

rm -f "$LOCK_FILE"

echo "✅ Deployment completed successfully"
