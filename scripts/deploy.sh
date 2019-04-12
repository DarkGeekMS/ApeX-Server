#!/bin/bash
set -euox pipefail

PROJECT_ID="lunar-clone-235511"
COMPUTE_ZONE="us-central1-c"
VM_INSTANCE="mido3ds@main"

main() {
    # login
    gcloud auth activate-service-account \
	$GCD_ACCOUNT_SECRET  --key-file="$GCD_KEYFILE_SECRET"
    
    gcloud config set project $PROJECT_ID
    gcloud config set compute/zone $COMPUTE_ZONE

    # copy docker-compose.yml to update it there
    gcloud compute scp \
	production-docker-compose.yml \
	$VM_INSTANCE:docker-compose.yml 

    # run docker-compose
    gcloud compute ssh $VM_INSTANCE \
	--command="sudo BRANCH=${BRANCH:master} \
		   docker-compose up --build --no-deps -d"
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
