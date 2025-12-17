#!/usr/bin/env bash
set -e

# ==============================================================
# deploy.sh — Application deploy only (zero-downtime)
# Depends on setup.sh having passed
# ==============================================================

APP_NAME="logisticjourney"
APP_DIR="/var/www/${APP_NAME}"
BRANCH="staging"
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
    git reset --hard "$(cat $PREV_SHA_FILE)" || true
    php artisan optimize:clear || true
  fi
  rm -f "$LOCK_FILE"
}

trap rollback ERR

# --------------------------------------------------
# Record current revision
# --------------------------------------------------
echo "➤ Recording current revision"
git rev-parse HEAD > "$PREV_SHA_FILE"

# --------------------------------------------------
# Update code (SSH-based Git)
# --------------------------------------------------
echo "➤ Updating code"
git fetch origin "$BRANCH"
git reset --hard "origin/$BRANCH"

# --------------------------------------------------
# Backend dependencies
# --------------------------------------------------
echo "➤ Installing PHP dependencies"
composer install --no-dev --prefer-dist --optimize-autoloader

# --------------------------------------------------
# Frontend build (only if applicable)
# --------------------------------------------------
if [ -f package.json ]; then
  echo "➤ Building frontend assets"
  npm ci || npm install
  npm run build
else
  echo "ℹ️ No frontend detected — skipping build"
fi

# --------------------------------------------------
# Database migrations
# --------------------------------------------------
echo "➤ Running migrations"
php artisan migrate --force

# --------------------------------------------------
# Laravel optimizations
# --------------------------------------------------
echo "➤ Optimizing application"
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# --------------------------------------------------
# Optional worker & PHP tuning
# --------------------------------------------------
[ -f scripts/ensure-worker.sh ] && sudo ./scripts/ensure-worker.sh || true
[ -f scripts/php-fpm.sh ] && sudo ./scripts/php-fpm.sh || true

# --------------------------------------------------
# Reload services (safe)
# --------------------------------------------------
echo "➤ Reloading services"
sudo nginx -t && sudo systemctl reload nginx
sudo systemctl reload php8.4-fpm

# --------------------------------------------------
# Cleanup
# --------------------------------------------------
rm -f "$LOCK_FILE"
echo "✅ Deploy completed successfully"
