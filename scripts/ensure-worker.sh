#!/usr/bin/env bash
set -e

APP_DIR="$(pwd)"
WORKER_NAME="laravel-worker"
CONF_FILE="/etc/supervisor/conf.d/${WORKER_NAME}.conf"
QUEUE_CONNECTION=$(grep -E '^QUEUE_CONNECTION=' .env | cut -d '=' -f2)

[ -z "$QUEUE_CONNECTION" ] || [ "$QUEUE_CONNECTION" = "sync" ] && echo "ℹ️ Queue sync — worker not required" && exit 0

command -v supervisorctl >/dev/null 2>&1 || { sudo apt update -y && sudo apt install supervisor -y; }

DESIRED_CONF="[program:${WORKER_NAME}]
command=php ${APP_DIR}/artisan queue:work ${QUEUE_CONNECTION} --sleep=3 --tries=3 --timeout=60
directory=${APP_DIR}
autostart=true
autorestart=true
user=www-data
numprocs=1
redirect_stderr=true
stdout_logfile=${APP_DIR}/storage/logs/worker.log
stopwaitsecs=3600"

if [ -f "$CONF_FILE" ]; then
  CURRENT_HASH=$(sudo sha256sum "$CONF_FILE" | awk '{print $1}')
  DESIRED_HASH=$(echo "$DESIRED_CONF" | sha256sum | awk '{print $1}')
  [ "$CURRENT_HASH" != "$DESIRED_HASH" ] && echo "$DESIRED_CONF" | sudo tee "$CONF_FILE" >/dev/null
else
  echo "$DESIRED_CONF" | sudo tee "$CONF_FILE" >/dev/null
fi

sudo supervisorctl reread
sudo supervisorctl update

STATUS=$(sudo supervisorctl status ${WORKER_NAME} | awk '{print $2}')
[ "$STATUS" != "RUNNING" ] && sudo supervisorctl start ${WORKER_NAME}

sudo supervisorctl status ${WORKER_NAME}
