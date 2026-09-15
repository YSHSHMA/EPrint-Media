#!/bin/bash

set -e

echo "Clearing Laravel cache..."
php artisan optimize:clear
php artisan view:clear

echo "Starting Supervisor..."
exec /usr/bin/supervisord -n -c /etc/supervisor/conf.d/supervisord.conf