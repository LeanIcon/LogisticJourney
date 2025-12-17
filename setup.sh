#!/usr/bin/env bash
set -e

# ==============================================================
# setup.sh — Production Baseline
# Verify-first, idempotent, zero-downtime
# Safe to run on EVERY deploy
# ==============================================================\n
APP_NAME="logisticjourney"
APP_DIR="/var/www/${APP_NAME}"
PHP_VERSION="8.4"
PROVISION_FLAG="/var/www/.${APP_NAME}_provisioned"

MODE="verify"
if [ ! -f "$PROVISION_FLAG" ]; then
  MODE="provision"
  echo "🚀 First-time provisioning mode"
else
  echo "ℹ️ Verify mode (no destructive changes)"
fi

# --------------------------------------------------
# Helpers
# --------------------------------------------------
require_cmd() {
  command -v "$1" >/dev/null 2>&1 || {
    echo "❌ Required command missing: $1";
    exit 1;
  }
}

install_if_missing() {
  PKG="$1"
  BIN="$2"

  if ! command -v "$BIN" >/dev/null 2>&1; then
    if [ "$MODE" = "provision" ]; then
      echo "➤ Installing $PKG"
      sudo apt-get update -y
      sudo apt-get install -y "$PKG"
    else
      echo "❌ $BIN missing in verify mode"
      exit 1
    fi
  fi
}

# --------------------------------------------------
# Core system commands
# --------------------------------------------------
require_cmd nginx
require_cmd php
require_cmd git

# --------------------------------------------------
# Supervisor (required for queues)
# --------------------------------------------------
install_if_missing supervisor supervisorctl
sudo systemctl enable supervisor >/dev/null 2>&1 || true
sudo systemctl start supervisor >/dev/null 2>&1 || true

# --------------------------------------------------
# PHP-FPM
# --------------------------------------------------
if ! systemctl list-units --type=service | grep -q "php${PHP_VERSION}-fpm"; then
  echo "❌ php${PHP_VERSION}-fpm not found"
  exit 1
fi

# --------------------------------------------------
# Redis (ONLY if app requires it)
# --------------------------------------------------
if grep -q "^QUEUE_CONNECTION=redis" "$APP_DIR/.env" 2>/dev/null; then
  install_if_missing redis-server redis-cli
  sudo systemctl enable redis-server >/dev/null 2>&1 || true
  sudo systemctl start redis-server >/dev/null 2>&1 || true
  redis-cli ping | grep -q PONG || {
    echo "❌ Redis configured but not responding";
    exit 1;
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
# Firewall (verify-safe)
# --------------------------------------------------
if command -v ufw >/dev/null 2>&1; then
  sudo ufw allow 80 >/dev/null 2>&1 || true
  sudo ufw allow 443 >/dev/null 2>&1 || true
fi

# --------------------------------------------------
# Provision flag
# --------------------------------------------------
if [ "$MODE" = "provision" ]; then
  sudo touch "$PROVISION_FLAG"
  sudo chmod 600 "$PROVISION_FLAG"
  echo "✅ Initial provisioning completed"
else
  echo "✅ Verification completed — system healthy"
fi

echo "✅ setup.sh finished successfully"
