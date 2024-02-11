#!/bin/bash

cmd_run="docker compose up -d --build"

if command -v $cmd_run &> /dev/null; then
    echo "Running command: $cmd_run"
    $cmd_run
    if [ $? -ne 0 ]; then
        echo "Error occurred while running the command: $cmd_run"
        exit 1
    else
        echo "Command executed successfully: $cmd_run"
    fi
else
    echo "Error: Command '$cmd_run' not found."
    exit 1
fi
sleep 10
echo "Change permission."
docker exec -it laravel-umkm chmod -R storage
echo "Run migration."
docker exec -it laravel-umkm php artisan migrate
echo "Run clear cache."
docker exec -it laravel-umkm php artisan optimize:clear
echo "Run storage link."
docker exec -it laravel-umkm php artisan storage:link