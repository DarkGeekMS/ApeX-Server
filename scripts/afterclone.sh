#!/bin/bash
# after clone setup commmands

cp .env.example .env

# if using windows, pass first arg /
PWD2=$1$PWD

# NOTE: 
# instead of `composer install` on host, you can copy vendor file from app.dockerfile container
# using `apk add composer && composer install` on container,
# then `sudo docker cp <container-name>:/app/vendor /vendor` on host.
docker run --rm -v $PWD2:/app composer install -o

docker-compose up -d
docker-compose exec app php7 artisan key:generate
docker-compose exec app php7 artisan optimize
docker-compose exec app /bin/ash -c 'php7 artisan migrate --seed || echo migration failed!'
docker-compose down