#!/usr/bin/env bash
set -euo pipefail

# Remote deploy script for Laravel app. This script is uploaded to the server
# and executed there by the GitHub Actions workflow. It assumes the repo has
# already been copied into the REMOTE_DIR and that composer & php are available.

echo "Running remote deploy script: $(date)"

# If $RELEASE_DIR or other env var passed from action use it. Otherwise use pwd
APP_DIR="${APP_DIR:-$(pwd)}"
cd "$APP_DIR"

echo "Current directory: $(pwd)"

# Ensure composer is available
if ! command -v composer >/dev/null 2>&1; then
  echo "composer not found in PATH. Exiting. Install composer on server or add it to PATH." >&2
  exit 1
fi

echo "Installing composer dependencies (no-dev)..."
composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader || true

echo "Running artisan migrations (forced)..."
if command -v php >/dev/null 2>&1 && [ -f artisan ]; then
  php artisan migrate --force || true
  php artisan config:cache || true
  php artisan route:cache || true
  php artisan view:cache || true
  php artisan optimize || true
else
  echo "artisan not found or php not installed; skipping artisan tasks." >&2
fi

echo "Setting permissions for storage and bootstrap/cache if possible..."
if id -u www-data >/dev/null 2>&1; then
  sudo chown -R www-data:www-data storage bootstrap/cache || true
elif id -u www >/dev/null 2>&1; then
  sudo chown -R www:www storage bootstrap/cache || true
else
  echo "Could not find typical web user (www-data/www). Skipping chown." >&2
fi

echo "Remote deploy finished: $(date)"
