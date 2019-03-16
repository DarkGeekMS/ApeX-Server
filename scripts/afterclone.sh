#!/bin/bash
set -euox pipefail

cp .env.example .env

composer install -o

php7 artisan key:generate

php7 artisan migrate -v
composer dump-autoload
php7 artisan DB:seed