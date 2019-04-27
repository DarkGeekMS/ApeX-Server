#!/bin/bash
set -ex

phpenv config-rm xdebug.ini # remove xdebug to speed up testing
cp .env.example .env

env PORT=8080 SEED='true' UNIT_TEST='true' E2E_TEST='true'  docker-compose up --build --exit-code-from app

