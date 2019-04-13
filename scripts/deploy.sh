#!/bin/bash
set -eox pipefail

PROJECT_ID="lunar-clone-235511"
COMPUTE_ZONE="us-central1-c"
VM_INSTANCE="mido3ds@main"

main() {
    # login
    gcloud auth activate-service-account --key-file="$GCP_KEYFILE_SECRET"
    
    gcloud config set project $PROJECT_ID
    gcloud config set compute/zone $COMPUTE_ZONE

    # copy docker-compose.yml to update it there
    gcloud compute scp \
	production-docker-compose.yml \
	$VM_INSTANCE:docker-compose.yml 

    # run docker-compose
    gcloud compute ssh $VM_INSTANCE \
	--command="sudo BRANCH=${BRANCH} \
		   docker-compose up --build --no-deps -d"
}

if [[ -z "$BRANCH" ]]; then
	BRANCH=`git rev-parse --abbrev-ref HEAD`
fi

if [[ "$#" == 1 ]]; then
  GCP_KEYFILE_SECRET="$1"
else
  echo "Wrong number of arguments specified."
  echo "Usage: deploy.sh /path/to/keyfile"
  exit 1
fi

main
