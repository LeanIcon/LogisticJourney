#!/usr/bin/env bash
set -e

APP_DIR="/var/www/acrazydayinaccra"
cd "$APP_DIR"

echo "📥 Updating code"
git fetch origin main
git reset --hard origin/main

echo "📦 Composer"
composer install --no-dev --prefer-dist --optimize-autoloader

echo "📦 Frontend build"
npm ci && npm run build

echo "🗃️ Migrations"
php artisan migrate --force

echo "⚡ Optimizing"
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "👷 Queue worker"
sudo ./scripts/ensure-worker.sh

echo "🔧 PHP-FPM"
sudo ./scripts/php-fpm.sh

echo "🔄 Reload services"
sudo nginx -t && sudo systemctl reload nginx
sudo systemctl reload php8.4-fpm

echo "✅ Deploy completed safely"
