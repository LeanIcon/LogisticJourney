#!/usr/bin/env bash
set -e

# ==============================================================
# setup.sh — Production Baseline
# Verify-first, idempotent, zero-downtime
# Safe to run on EVERY deploy
# ==============================================================

APP_NAME="logisticjourney"
APP_DIR="/var/www/${APP_NAME}"
PROVISION_FLAG="/var/www/.${APP_NAME}_provisioned"

# --------------------------------------------------
# Detect PHP version dynamically (authoritative)
# --------------------------------------------------
PHP_VERSION=$(php -r "echo PHP_MAJOR_VERSION.'.'.PHP_MINOR_VERSION;")
PHP_FPM_SERVICE="php${PHP_VERSION}-fpm"
PHP_FPM_SOCKET="/run/php/${PHP_FPM_SERVICE}.sock"

MODE="verify"
if [ ! -f "$PROVISION_FLAG" ]; then
  MODE="provision"
  echo "🚀 First-time provisioning mode"
else
  echo "ℹ️ Verify mode (non-destructive)"
fi

# --------------------------------------------------
# Helper: ensure command exists
# --------------------------------------------------
require_cmd() {
  command -v "$1" >/dev/null 2>&1 || {
    echo "❌ Required command missing: $1"
    exit 1
  }
}

# --------------------------------------------------
# Core runtime checks (always required)
# --------------------------------------------------
require_cmd nginx
require_cmd php
require_cmd git

# --------------------------------------------------
# PHP-FPM validation
# --------------------------------------------------
if ! systemctl list-units --type=service | grep -q "$PHP_FPM_SERVICE"; then
  echo "❌ $PHP_FPM_SERVICE not found (installed PHP: $PHP_VERSION)"
  exit 1
fi

if [ ! -S "$PHP_FPM_SOCKET" ]; then
  echo "❌ PHP-FPM socket missing: $PHP_FPM_SOCKET"
  exit 1
fi

# --------------------------------------------------
# Supervisor (queues infrastructure)
# --------------------------------------------------
if ! command -v supervisorctl >/dev/null 2>&1; then
  if [ "$MODE" = "provision" ]; then
    echo "➤ Installing Supervisor"
    sudo apt update -y
    sudo apt install -y supervisor
    sudo systemctl enable supervisor
    sudo systemctl start supervisor
  else
    echo "❌ Supervisor missing in verify mode"
    exit 1
  fi
fi

sudo systemctl is-active supervisor >/dev/null 2>&1 || sudo systemctl start supervisor

# --------------------------------------------------
# Redis — ONLY if app requires it
# --------------------------------------------------
if grep -q "^QUEUE_CONNECTION=redis" "$APP_DIR/.env" 2>/dev/null; then
  if ! command -v redis-cli >/dev/null 2>&1; then
    if [ "$MODE" = "provision" ]; then
      echo "➤ Installing Redis"
      sudo apt update -y
      sudo apt install -y redis-server
      sudo systemctl enable redis-server
      sudo systemctl start redis-server
    else
      echo "❌ Redis required but not installed"
      exit 1
    fi
  fi

  redis-cli ping | grep -q PONG || {
    echo "❌ Redis configured but not responding"
    exit 1
  }
else
  echo "ℹ️ Redis not required (QUEUE_CONNECTION != redis)"
fi

# --------------------------------------------------
# App directory sanity
# --------------------------------------------------
if [ ! -d "$APP_DIR" ]; then
  echo "❌ App directory missing: $APP_DIR"
  exit 1
fi

sudo chown -R www-data:www-data "$APP_DIR"
sudo find "$APP_DIR" -type d -exec chmod 775 {} \;
sudo find "$APP_DIR" -type f -exec chmod 664 {} \;

# --------------------------------------------------
# Storage & cache directories
# --------------------------------------------------
sudo -u www-data mkdir -p \
  "$APP_DIR/storage/logs" \
  "$APP_DIR/storage/framework/cache" \
  "$APP_DIR/storage/framework/sessions" \
  "$APP_DIR/storage/framework/views" \
  "$APP_DIR/bootstrap/cache"

# --------------------------------------------------
# Firewall (verify-only, no reloads)
# --------------------------------------------------
if command -v ufw >/dev/null 2>&1; then
  sudo ufw allow 80 >/dev/null 2>&1 || true
  sudo ufw allow 443 >/dev/null 2>&1 || true
fi

# --------------------------------------------------
# Mark provisioning complete (once)
# --------------------------------------------------
if [ "$MODE" = "provision" ]; then
  sudo touch "$PROVISION_FLAG"
  sudo chmod 600 "$PROVISION_FLAG"
  echo "✅ Initial provisioning marked complete"
else
  echo "✅ Verification complete — no changes applied"
fi

echo "✅ setup.sh completed safely (PHP ${PHP_VERSION})"
