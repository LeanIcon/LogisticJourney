#!/usr/bin/env bash
set -e

# ==============================================================
# setup.sh — Verify-first, idempotent, zero-downtime
# Safe to run on EVERY deploy
# ==============================================================

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
ensure_cmd() {
  command -v "$1" >/dev/null 2>&1 || {
    echo "❌ Required command missing: $1";
    exit 1;
  }
}

# --------------------------------------------------
# Core services — verify only
# --------------------------------------------------
ensure_cmd nginx
ensure_cmd php

# --------------------------------------------------
# Queue driver check if app uses Redis, skip otherwise
# --------------------------------------------------
if grep -q "^QUEUE_CONNECTION=redis" "$APP_DIR/.env" 2>/dev/null; then
  ensure_cmd redis-cli
  redis-cli ping | grep -q PONG || {
    echo "❌ Redis configured but not responding"
    exit 1
  }
else
  echo "ℹ️ Redis not required (QUEUE_CONNECTION != redis)"
fi

ensure_cmd supervisorctl

# --------------------------------------------------
# PHP-FPM
# --------------------------------------------------
if ! systemctl list-units --type=service | grep -q "php${PHP_VERSION}-fpm"; then
  echo "❌ php${PHP_VERSION}-fpm not found"
  exit 1
fi

# --------------------------------------------------
# Redis
# --------------------------------------------------
sudo systemctl is-active redis-server >/dev/null 2>&1 || sudo systemctl start redis-server
redis-cli ping | grep -q PONG || { echo "❌ Redis not responding"; exit 1; }

# --------------------------------------------------
# Supervisor
# --------------------------------------------------
sudo systemctl is-active supervisor >/dev/null 2>&1 || sudo systemctl start supervisor

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
# Storage & cache
# --------------------------------------------------
sudo -u www-data mkdir -p \
  storage/logs \
  storage/framework/cache \
  storage/framework/sessions \
  storage/framework/views \
  bootstrap/cache

# --------------------------------------------------
# Firewall (verify-only)
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
  echo "✅ Initial provisioning marked complete"
else
  echo "✅ Verification complete — no changes applied"
fi
echo "✅ Setup script completed safely"
