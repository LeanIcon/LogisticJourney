#!/usr/bin/env bash
set -euo pipefail

# Remote deploy script for Laravel app
echo "=== Starting deployment: $(date) ==="

APP_DIR="${APP_DIR:-$(pwd)}"
cd "$APP_DIR"
echo "Working directory: $(pwd)"

# Early Scribe config backup to prevent loading errors (before any artisan)
echo "--- Early Scribe config handling to avoid errors ---"
if [ -f "config/scribe.php" ]; then
    mv config/scribe.php config/scribe.php.bak
    echo "✓ scribe.php backed up (restore after adding Scribe locally)"
fi

# Pre-Step: PHP/NGINX config for large uploads (like workflow)
echo "--- Configuring PHP for large uploads ---"
for PHP_VER in 8.3 8.4; do
    for MODE in fpm cli; do
        INI_FILE="/etc/php/${PHP_VER}/${MODE}/conf.d/99-uploads.ini"
        echo "upload_max_filesize = 1024M
post_max_size = 1024M
memory_limit = 1024M
max_execution_time = 1800
max_input_time = 1800" | sudo tee "$INI_FILE" >/dev/null 2>&1 || true
    done
done

# NGINX client max body (idempotent)
if ! sudo grep -q "client_max_body_size" /etc/nginx/nginx.conf; then
    sudo sed -i '/http {/a \ \ \ \ client_max_body_size 1024M;\n\ \ \ \ client_body_timeout 1800s;\n\ \ \ \ client_header_timeout 1800s;' /etc/nginx/nginx.conf || true
fi

# Pre-Step: Early full permissions fix (like workflow)
echo "--- Fixing early permissions ---"
sudo chown -R www-data:www-data . 2>/dev/null || true
sudo find . -type d -exec chmod 775 {} \; 2>/dev/null || true
sudo find . -type f -exec chmod 664 {} \; 2>/dev/null || true

# ============================================
# Step 1: Setup .env file (always copy from .env.example)
# ============================================
echo "--- Setting up .env from .env.example ---"
if [ -f .env.example ]; then
    sudo cp .env.example .env
    echo ".env overwritten from .env.example"
else
    echo "ERROR: .env.example not found!" >&2
    exit 1
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

# Install prod deps (run as www-data; assumes Scribe in composer.json "require" locally)
export COMPOSER_ALLOW_SUPERUSER=1
sudo -u www-data $COMPOSER_CMD install --no-dev --no-scripts --prefer-dist --no-interaction --optimize-autoloader

# ============================================
# Step 2.5: Install Node Dependencies & Build Assets
# ============================================
echo "--- Preparing Node environment ---"
sudo mkdir -p /var/www/.npm
sudo chown -R www-data:www-data /var/www/.npm 2>/dev/null || true

echo "--- Installing Node dependencies ---"
if command -v npm >/dev/null 2>&1; then
    sudo -u www-data npm ci --no-audit --no-fund --progress=false || sudo -u www-data npm install --no-audit --no-fund --progress=false
else
    echo "WARNING: npm not found—install Node.js for asset builds"
fi

echo "--- Building frontend assets ---"
sudo -u www-data npm run build || echo "WARNING: npm run build failed (check package.json scripts)"

# ============================================
# Scribe Handling (post-install; assumes pre-committed as prod dep)
# ============================================
echo "--- Handling Scribe for /docs ---"
HAS_SCRIBE=false
if sudo -u www-data $COMPOSER_CMD show knuckleswtf/scribe --no-dev >/dev/null 2>&1; then
    echo "✓ Scribe detected in prod deps"
    HAS_SCRIBE=true
    sudo -u www-data php artisan vendor:publish --tag=scribe-config --force || true
    sudo -u www-data php artisan vendor:publish --tag=scribe-routes || true
    # Restore config if backed up
    if [ -f "config/scribe.php.bak" ]; then
        mv config/scribe.php.bak config/scribe.php
    fi
else
    echo "✗ Scribe not in prod deps—/docs unavailable until 'composer require knuckleswtf/scribe' locally, commit, re-deploy"
fi

# ============================================
# Step 3: Generate APP_KEY if missing
# ============================================
echo "--- Checking APP_KEY ---"
if ! grep -q "APP_KEY=base64:" .env; then
    echo "APP_KEY not set, generating..."
    sudo -u www-data php artisan key:generate --force
    echo "APP_KEY generated"
else
    echo "APP_KEY already set"
fi

# ============================================
# Step 4: Clear all caches
# ============================================
echo "--- Clearing caches ---"
sudo -u www-data php artisan config:clear || true
sudo -u www-data php artisan cache:clear || true
sudo -u www-data php artisan view:clear || true
sudo -u www-data php artisan route:clear || true
sudo -u www-data php artisan optimize:clear || true

# ============================================
# Step 5: Run migrations
# ============================================
echo "--- Running migrations ---"
sudo -u www-data php artisan migrate --force || echo "Warning: Migrations failed or not needed"

# ============================================
# Step 6: Optimize for production
# ============================================
echo "--- Optimizing for production ---"
sudo -u www-data php artisan config:cache
sudo -u www-data php artisan route:cache
sudo -u www-data php artisan view:cache
sudo -u www-data php artisan optimize

# ============================================
# Step 7: Set permissions (enhanced for sessions, like workflow)
# ============================================
echo "--- Setting permissions ---"
sudo mkdir -p storage/framework/sessions storage/logs bootstrap/cache
sudo -u www-data touch storage/logs/laravel.log
sudo chown -R www-data:www-data storage bootstrap/cache vendor . node_modules 2>/dev/null || echo "Warning: Could not set ownership"
sudo chmod -R ug+rwx storage bootstrap/cache 2>/dev/null || echo "Warning: Could not set permissions"
sudo find . -type d -exec chmod 775 {} \; 2>/dev/null || true
sudo find . -type f -exec chmod 664 {} \; 2>/dev/null || true

# ============================================
# Step 8: Restart PHP-FPM & Nginx (like workflow; after PHP config)
# ============================================
echo "--- Restarting services ---"
sudo systemctl restart php8.3-fpm 2>/dev/null || true
sudo systemctl restart php8.4-fpm 2>/dev/null || true
sudo systemctl reload nginx 2>/dev/null || true  # Reload for config changes

# ============================================
# Step 9: Post-Deploy Verification
# ============================================
echo "--- Post-deploy checks ---"
if [ "$HAS_SCRIBE" = true ] && sudo -u www-data php artisan route:list | grep -q "docs"; then
    echo "✓ Scribe /docs route registered"
elif [ "$HAS_SCRIBE" = false ]; then
    echo "✗ /docs skipped (Scribe not in prod)"
else
    echo "✗ /docs route missing—ensure Scribe published"
fi
if [ -d "storage/framework/sessions" ] && sudo -u www-data test -w "storage/framework/sessions"; then
    echo "✓ Sessions directory writable"
else
    echo "✗ Sessions not writable—check logs"
fi
# Quick PHP config verify (like workflow)
php -i | grep -E "(upload_max_filesize|post_max_size|max_execution_time|memory_limit)" || true
echo "Deployment ready. Test login. Check storage/logs/laravel.log if issues."

echo "=== Deployment completed successfully: $(date) ==="