#!/bin/bash
set -ex

cp .env.example .env
echo GITHUB_TOKEN=$GITHUB_TOKEN >> .env
source .env

env PORT=8080 SEED='true' UNIT_TEST='true' E2E_TEST='true'  docker-compose up --build --exit-code-from app

