#!/bin/bash
set -ex

phpenv config-rm xdebug.ini # remove xdebug to speed up testing
cp .env.example .env

docker build . -t app-image --build-arg MIGRATE='true' --build-arg TEST='true'
docker-compose up --exit-code-from app
