#!/bin/bash
set -euox pipefail

docker-compose up --build -d 
docker-compose exec app php7 artisan serve --host=0.0.0.0 --port=80