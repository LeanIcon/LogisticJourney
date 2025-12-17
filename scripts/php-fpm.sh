#!/usr/bin/env bash
set -e

PHP_VERSION="8.4"
POOL_CONF="/etc/php/${PHP_VERSION}/fpm/pool.d/www.conf"
CUSTOM_INI="/etc/php/${PHP_VERSION}/fpm/conf.d/99-app.ini"
RELOAD_REQUIRED=false

apply_pool() {
  KEY="$1"; VALUE="$2"
  if grep -q "^${KEY}" "$POOL_CONF"; then
    CURRENT=$(grep "^${KEY}" "$POOL_CONF" | awk -F '=' '{print $2}' | xargs)
    [ "$CURRENT" != "$VALUE" ] && sudo sed -i "s|^${KEY}.*|${KEY} = ${VALUE}|" "$POOL_CONF" && RELOAD_REQUIRED=true
  else
    echo "${KEY} = ${VALUE}" | sudo tee -a "$POOL_CONF" >/dev/null
    RELOAD_REQUIRED=true
  fi
}

apply_ini() {
  KEY="$1"; VALUE="$2"
  if grep -q "^${KEY}" "$CUSTOM_INI" 2>/dev/null; then
    CURRENT=$(grep "^${KEY}" "$CUSTOM_INI" | awk -F '=' '{print $2}' | xargs)
    [ "$CURRENT" != "$VALUE" ] && sudo sed -i "s|^${KEY}.*|${KEY} = ${VALUE}|" "$CUSTOM_INI" && RELOAD_REQUIRED=true
  else
    echo "${KEY} = ${VALUE}" | sudo tee -a "$CUSTOM_INI" >/dev/null
    RELOAD_REQUIRED=true
  fi
}

apply_pool "pm" "dynamic"
apply_pool "pm.max_children" "10"
apply_pool "pm.start_servers" "3"
apply_pool "pm.min_spare_servers" "2"
apply_pool "pm.max_spare_servers" "5"
apply_pool "pm.max_requests" "500"

apply_ini "memory_limit" "512M"
apply_ini "max_execution_time" "60"
apply_ini "opcache.enable" "1"

if [ "$RELOAD_REQUIRED" = true ]; then
  sudo systemctl reload php${PHP_VERSION}-fpm
  echo "✅ PHP-FPM reloaded (drift corrected)"
else
  echo "ℹ️ PHP-FPM already compliant — no reload"
fi
