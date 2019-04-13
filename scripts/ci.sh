#!/bin/bash
set -ex

phpenv config-rm xdebug.ini # remove xdebug to speed up testing
cp .env.example .env

env PORT=8080 MIGRATE='true' TEST='true' docker-compose up --build --exit-code-from app
