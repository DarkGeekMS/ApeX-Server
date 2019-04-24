#!/bin/bash
set -e

if [[ -z ${GITHUB_TOKEN} ]]; then
    echo you must have github token
    exit 1
fi

main() {
    echo Fetching ApeX-Web files from branch $WEB_BRANCH...

    git clone https://${GITHUB_TOKEN}@github.com/DarkGeekMS/ApeX-Web.git $FRONT_DIR -b $WEB_BRANCH

    echo Done Fetching files

    echo Compiling...

    cp scripts/fix $FRONT_DIR/fix # temp workaround

    pushd $FRONT_DIR
      npm install
      mv fix node_modules/@intervolga/optimize-cssnano-plugin/index.js # temp workaround
      npm run build
    popd
    
    cp -r $FRONT_DIR/dist/* public/
    mv public/index.html resources/views/welcome.blade.php

    echo Success!
}

cleanup() { rm -rf $FRONT_DIR; }

WEB_BRANCH=${1-master}
FRONT_DIR=`mktemp -d -p .`
trap cleanup EXIT

main "$@"
