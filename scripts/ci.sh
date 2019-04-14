#!/bin/bash
set -ex

phpenv config-rm xdebug.ini # remove xdebug to speed up testing
cp .env.example .env

# unit tests
env PORT=8080 MIGRATE='true' TEST='true' docker-compose up --build --exit-code-from app

# e2e tests
#env PORT='127.0.0.1:8080' WEB_BRANCH=master docker-compose up --build -d
git clone https://${GITHUB_TOKEN}@github.com/RehamGamal97/apeXTesting e2e
#docker build e2e -t e2e --build-arg SERVER_URL="http://35.232.3.8" 
#docker run --rm -it e2e 
#docker run -it --rm -v "$(pwd)"/e2e/:/usr/src/mymaven -w /usr/src/mymaven maven:3.3-jdk-8 chmod +x /usr/src/mymaven/driver/chromedriver.exe
#docker run -it --rm -v "$(pwd)"/e2e/:/usr/src/mymaven -w /usr/src/mymaven maven:3.3-jdk-8 mvn clean install
env PORT=8080 docker-compose -f e2e-docker-compose.yml up --build --exit-code-from e2e
