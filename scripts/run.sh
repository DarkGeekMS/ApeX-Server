#!/bin/bash
set -ex

getFront() { ./scripts/getFront.sh $WEB_BRANCH; }

install() { composer install --optimize-autoloader --no-dev; }

migrate() {
    php7 artisan migrate -n --force
    composer dump-autoload
}

seed() { php7 artisan DB:seed -n --force; }

runTests() { ./vendor/bin/phpunit --bootstrap ./vendor/autoload.php --testdox tests; }

serve() { php7 artisan serve --host=0.0.0.0 --port=80; }

getFront
install
migrate

if [[ "$SEED" == 'true' ]]; then 
    seed
fi

if [[ "$TEST" == 'true' ]]; then
    serve &
    sleep 3
    runTests
else
    serve
fi