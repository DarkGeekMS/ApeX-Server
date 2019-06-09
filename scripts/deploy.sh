#!/bin/bash
set -eox pipefail

main() {
    # login
    gcloud auth activate-service-account --key-file="$GCP_KEYFILE_SECRET"
    
    gcloud config set project $PROJECT_ID
    gcloud config set compute/zone $COMPUTE_ZONE

    # copy docker-compose.yml to update it there
    gcloud compute scp \
      production-docker-compose.yml \
      $VM_INSTANCE:/apex/docker-compose.yml 

    # run docker-compose
    gcloud compute ssh $VM_INSTANCE \
        --command="cd /apex && sudo BRANCH=${BRANCH} \
            docker-compose -p production up --build --no-deps -d"
}

if [[ -z "$BRANCH" ]]; then
    BRANCH=`git rev-parse --abbrev-ref HEAD`
fi

if [[ "$#" == 1 ]] && [[ ! -z "$PROJECT_ID" ]] && [[ ! -z "$COMPUTE_ZONE" ]] && [[ ! -z "$VM_INSTANCE" ]]; then
    GCP_KEYFILE_SECRET="$1"
else
    echo "Wrong number of arguments specified."
    echo "Usage: env PROJECT_ID='<your gcloud project id>' COMPUTE_ZONE='<gcloud compute zone>' VM_INSTANCE='<userName>@<vmName>' deploy.sh /path/to/keyfile"
    exit 1
fi

main
