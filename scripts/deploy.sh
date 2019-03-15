#!/bin/bash
set -euox pipefail

PROJECT_ID=""#TODO
COMPUTE_ZONE=us-central1-b #TODO
IMAGE=""#TODO

DEPLOYMENT=""#TODO
VM_INSTANCE=""#TODO

main() {
    gcloud auth activate-service-account $GCD_ACCOUNT_SECRET  --key-file="$GCD_KEYFILE_SECRET"
    gcloud auth configure-docker

    gcloud config set project $PROJECT_ID
    gcloud config set compute/zone $COMPUTE_ZONE

    docker build -t gcr.io/${PROJECT_ID}/$IMAGE . -f app.dockerfile
    docker push gcr.io/${PROJECT_ID}/$IMAGE

    #TODO: kube or simple vm?
    #TODO: if vm, rollout with shutdown or without?
    # kubectl set image deployment/$DEPLOYMENT $DEPLOYMENT=gcr.io/${PROJECT_ID}/$IMAGE
    # gcloud compute ssh $VM_INSTANCE 
    #   --command="docker pull gcr.io/${PROJECT_ID}/$IMAGE && docker run gcr.io/${PROJECT_ID}/$IMAGE"
}

if [[ "$#" == 2 ]]; then
  GCD_ACCOUNT_SECRET="$1"
  GCD_KEYFILE_SECRET="$2"
else
  echo "Wrong number of arguments specified."
  echo "Usage: deploy.sh account keyfile"
  exit 1
fi

main