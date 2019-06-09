#!/bin/bash
set -e

main() {
    echo Fetching ApeX-Web files from branch $WEB_BRANCH...

    git clone https://github.com/DarkGeekMS/ApeX-Web.git $FRONT_DIR -b $WEB_BRANCH

    echo Done Fetching files

    echo Compiling...

    pushd $FRONT_DIR
      npm install
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
