#!/bin/bash
set -ex

getFront() { ./scripts/getFront.sh $WEB_BRANCH; }

install() { composer install --optimize-autoloader --no-dev; }

migrate() {
    php7 artisan migrate -n --force
    composer dump-autoload
}

seed() { php7 artisan DB:seed -n --force; }

unitTests() { ./vendor/bin/phpunit --bootstrap ./vendor/autoload.php --testdox tests; }

e2eTests() { 
    git clone https://${GITHUB_TOKEN}@github.com/RehamGamal97/apeXTesting e2e
    pushd e2e
      cat scripts/dependencies | xargs apk add
      ./sripts/run.sh "http://localhost:80"
    popd
}

serve() { php7 artisan serve --host=0.0.0.0 --port=80; }

getFront
install
migrate

if [[ "$SEED" == 'true' ]]; then 
    seed
fi

if [[ "$UNIT_TEST" == 'true' ]] || [[ "$E2E_TEST" == 'true' ]]; then
    serve &
    sleep 10
else
    serve
fi

if [[ "$UNIT_TEST" == 'true' ]]; then 
    unitTests
fi

if [[ "$E2E_TEST" == 'true' ]]; then
    e2eTests
fi
