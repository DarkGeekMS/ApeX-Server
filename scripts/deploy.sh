#!/bin/bash

source deployEnvVars

gcloud auth login
gcloud auth configure-docker

gcloud config set project $PROJECT_ID
gcloud config set compute/zone $COMPUTE_ZONE

docker build -t gcr.io/${PROJECT_ID}/$IMAGE . -f app.dockerfile
docker push gcr.io/${PROJECT_ID}/$IMAGE

kubectl set image deployment/$DEPLOYMENT $DEPLOYMENT=gcr.io/${PROJECT_ID}/$IMAGE