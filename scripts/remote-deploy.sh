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

# Ensure key env vars for prod (add defaults if missing)
echo "--- Ensuring key .env vars for production ---"
if ! grep -q "^APP_URL=" .env; then
    echo "APP_URL missing—set to http://localhost (update manually!)"
    echo "APP_URL=http://localhost" >> .env
fi
if ! grep -q "^SESSION_DRIVER=" .env; then
    echo "SESSION_DRIVER=file" >> .env
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

# Install prod deps first (run as www-data if possible for ownership)
if command -v sudo >/dev/null 2>&1 && id -u www-data >/dev/null 2>&1; then
    export COMPOSER_ALLOW_SUPERUSER=1
    sudo -u www-data $COMPOSER_CMD install --no-dev --no-scripts --prefer-dist --no-interaction --optimize-autoloader
else
    $COMPOSER_CMD install --no-dev --no-scripts --prefer-dist --no-interaction --optimize-autoloader
fi

# Install/ensure Scribe as prod dep for /docs
if ! $COMPOSER_CMD show knuckleswtf/scribe >/dev/null 2>&1; then
    echo "--- Installing Scribe as production dependency for /docs ---"
    if command -v sudo >/dev/null 2>&1 && id -u www-data >/dev/null 2>&1; then
        sudo -u www-data $COMPOSER_CMD require knuckleswtf/scribe --no-interaction --no-scripts
    else
        $COMPOSER_CMD require knuckleswtf/scribe --no-interaction --no-scripts
    fi
fi

# Publish Scribe config/routes if needed
echo "--- Publishing Scribe config and routes ---"
php artisan vendor:publish --tag=scribe-config --force || true
php artisan vendor:publish --tag=scribe-routes || true

# Restore Scribe config if backed up
if [ -f "config/scribe.php.bak" ]; then
    echo "--- Restoring Scribe config for production ---"
    mv config/scribe.php.bak config/scribe.php
fi

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
# Step 7: Set permissions (enhanced for sessions)
# ============================================
echo "--- Setting permissions ---"
mkdir -p storage/framework/sessions  # Ensure sessions dir exists
sudo chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || echo "Warning: Could not set ownership"
sudo chmod -R 775 storage bootstrap/cache 2>/dev/null || chmod -R 775 storage bootstrap/cache 2>/dev/null || echo "Warning: Could not set permissions"

# ============================================
# Step 8: Restart PHP-FPM
# ============================================
echo "--- Restarting PHP-FPM ---"
sudo systemctl restart php8.3-fpm 2>/dev/null || echo "Warning: Could not restart PHP-FPM (may need manual restart)"

# ============================================
# Step 9: Post-Deploy Verification
# ============================================
echo "--- Post-deploy checks ---"
if php artisan route:list | grep -q "docs"; then
    echo "✓ Scribe /docs route registered"
else
    echo "✗ /docs route missing—check Scribe install"
fi
if [ -d "storage/framework/sessions" ] && [ -w "storage/framework/sessions" ]; then
    echo "✓ Sessions directory writable"
else
    echo "✗ Sessions not writable—fix permissions manually"
fi
echo "Deployment ready. Test login and /docs. Check logs if issues persist."

echo "=== Deployment completed successfully: $(date) ==="