#!/bin/bash
set -eux

prepare() {
    composer install -o

    php7 artisan key:generate

    php7 artisan migrate -v
    composer dump-autoload
    php7 artisan DB:seed
    php7 artisan jwt:secret
}

runTests() { ./vendor/bin/phpunit --bootstrap ./vendor/autoload.php --testdox tests; }

serve() { php7 artisan serve --host=0.0.0.0 --port=80; }

[[ ! -z "$PREPARE" ]] && { prepare; }

if [[ ! -z "$TEST" ]]; then
    serve &
    sleep 3
    runTests
else
    serve
fi
