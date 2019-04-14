#!/bin/bash
set -ex

composer install -o
npm install
php7 artisan migrate -v -n
composer dump-autoload

#TODO rename MIGRATE to SEED

if [[ "$MIGRATE" == 'true' ]]; then 
    php7 artisan DB:seed
    php7 artisan jwt:secret
fi


runTests() { ./vendor/bin/phpunit --bootstrap ./vendor/autoload.php --testdox tests; }
serve() { php7 artisan serve --host=0.0.0.0 --port=80; }
#TODO run serve in production
if [[ "$TEST" == 'true' ]]; then
    serve &
    sleep 3
    runTests
else
    serve
fi
