#!/bin/sh

sleep 10

php artisan migrate

php artisan serve --host=0.0.0.0 --port=8080
