#!/bin/bash

set -e

echo "Clearing Laravel cache..."
php artisan optimize:clear

echo "Starting Supervisor..."
exec /usr/bin/supervisord -n