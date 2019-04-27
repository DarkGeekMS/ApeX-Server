#!/bin/bash
set -ex


getFront() { ./scripts/getFront.sh $WEB_BRANCH; }

install() { composer install --optimize-autoloader; }

migrate() {
    php7 artisan migrate -n --force
    composer dump-autoload
}

seed() { php7 artisan DB:seed -n --force || echo maybe the database already seeded, ignoring; }

unitTests() { ./vendor/bin/phpunit --bootstrap ./vendor/autoload.php --testdox tests; }

e2eTests() { 
    git clone https://${GITHUB_TOKEN}@github.com/RehamGamal97/apeXTesting e2e
    pushd e2e
      cat scripts/dependencies | xargs apk add


      EXIT_CODE=0 && ./sripts/run.sh "http://localhost:80" || EXIT_CODE=$?
      
      EMAIL_CONTENT="E2E Tests Succeeded"
      if [[ $EXIT_CODE -ne 0 ]]; then
          EMAIL_CONTENT="E2E Tests Failed!"
      fi

      ./scripts/mailOutput.sh $EMAIL_CONTENT
    popd
}

serve() { php7 artisan serve --host=0.0.0.0 --port=80; }

getFront
install
migrate

# link public folder
php7 artisan storage:link -n -q

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
