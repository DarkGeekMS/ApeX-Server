#!/bin/bash
set -ex

getFront() { ./scripts/getFront.sh $WEB_BRANCH; }

install() { composer install --optimize-autoloader; }

migrate() {
    php7 artisan migrate -n --force
    composer dump-autoload
}

seed() { php7 artisan DB:seed -n --force; }

unitTests() { ./vendor/bin/phpunit --bootstrap ./vendor/autoload.php --testdox tests; }

e2eTests() { 
    git clone https://github.com/DarkGeekMS/apeXTesting e2e
    pushd e2e
      cat scripts/dependencies | xargs apk add


      EXIT_CODE=0 && ./sripts/run.sh "http://localhost:80" || EXIT_CODE=$?
      
      EMAIL_CONTENT="E2E Tests Succeeded"
      if [[ $EXIT_CODE -ne 0 ]]; then
          EMAIL_CONTENT="E2E Tests Failed!"
      fi

      ./scripts/mailOutput.sh $EMAIL_CONTENT
    popd
    
    return $EXIT_CODE
}

serve() { php7 artisan serve --host=0.0.0.0 --port=80; }

$(sleep 10 && migrate || exit 1) &

php7 artisan jwt:secret -f -n
php7 artisan storage:link -n -q

if [[ "$SEED" == 'true' ]]; then 
	$(sleep 30 && seed || exit 1) &
fi

if [[ "$UNIT_TEST" == 'true' ]] || [[ "$E2E_TEST" == 'true' ]]; then
    serve &
    sleep 40
else
    serve
fi

if [[ "$UNIT_TEST" == 'true' ]]; then 
    unitTests
fi

if [[ "$E2E_TEST" == 'true' ]]; then
    e2eTests
fi
