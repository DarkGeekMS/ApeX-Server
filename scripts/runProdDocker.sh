set -eu

echo deploying branch ${1} of back
echo mixing with branch ${2} of front
echo name of deployment ${3}

sudo  GITHUB_TOKEM=$GITHUB_TOKEN WEB_BRANCH=${2} BRANCH=${1} docker-compose -p ${3} -f production-docker-compose.yml up --build -d --no-deps && echo Success! || echo Failure!!
