#!/usr/bin/env bash
set -euo pipefail

# Remote deploy script for Laravel app
echo "=== Starting deployment: $(date) ==="

APP_DIR="${APP_DIR:-$(pwd)}"
cd "$APP_DIR"
echo "Working directory: $(pwd)"

# ============================================
# Step 1: Setup .env file
# ============================================
echo "--- Checking .env file ---"
if [ ! -f .env ]; then
    echo ".env not found, creating from .env.example..."
    if [ -f .env.example ]; then
        cp .env.example .env
        echo ".env created from .env.example"
    else
        echo "ERROR: .env.example not found!" >&2
        exit 1
    fi
fi

# ============================================
# Step 2: Find and use Composer
# ============================================
echo "--- Installing Composer dependencies ---"
COMPOSER_CMD=""
if command -v composer >/dev/null 2>&1; then
  COMPOSER_CMD="composer"
elif [ -f "/usr/local/bin/composer" ]; then
  COMPOSER_CMD="/usr/local/bin/composer"
elif [ -f "$HOME/.composer/composer" ]; then
  COMPOSER_CMD="$HOME/.composer/composer"
elif [ -f "$HOME/composer.phar" ]; then
  COMPOSER_CMD="php $HOME/composer.phar"
elif [ -f "./composer.phar" ]; then
  COMPOSER_CMD="php ./composer.phar"
elif [ -f "/usr/bin/composer" ]; then
  COMPOSER_CMD="/usr/bin/composer"
else
  echo "ERROR: composer not found!" >&2
  exit 1
fi

echo "Using composer: $COMPOSER_CMD"
$COMPOSER_CMD install --no-dev --no-scripts --prefer-dist --no-interaction --optimize-autoloader

# ============================================
# Step 3: Generate APP_KEY if missing
# ============================================
echo "--- Checking APP_KEY ---"
if ! grep -q "APP_KEY=base64:" .env; then
    echo "APP_KEY not set, generating..."
    php artisan key:generate --force
    echo "APP_KEY generated"
else
    echo "APP_KEY already set"
fi

# ============================================
# Step 4: Clear all caches
# ============================================
echo "--- Clearing caches ---"
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
php artisan optimize:clear || true

# ============================================
# Step 5: Run migrations
# ============================================
echo "--- Running migrations ---"
php artisan migrate --force || echo "Warning: Migrations failed or not needed"

# ============================================
# Step 6: Optimize for production
# ============================================
echo "--- Optimizing for production ---"
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

# ============================================
# Step 7: Set permissions
# ============================================
echo "--- Setting permissions ---"
sudo chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || echo "Warning: Could not set ownership"
sudo chmod -R 775 storage bootstrap/cache 2>/dev/null || chmod -R 775 storage bootstrap/cache 2>/dev/null || echo "Warning: Could not set permissions"

# ============================================
# Step 8: Restart PHP-FPM
# ============================================
echo "--- Restarting PHP-FPM ---"
sudo systemctl restart php8.3-fpm 2>/dev/null || echo "Warning: Could not restart PHP-FPM (may need manual restart)"

echo "=== Deployment completed successfully: $(date) ==="