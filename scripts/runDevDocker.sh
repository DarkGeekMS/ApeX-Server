#!/bin/bash
set -eu
sudo SEED=${3} PORT=${1-8000} WEB_BRANCH=${2-master} docker-compose up --build
