FROM alpine

COPY . /app
WORKDIR /app

RUN apk update \
    && \ 
    apk add \
        bash \
        php7 \
        php7-session \
        php7-fileinfo \
        php7-tokenizer \
        php7-dom \
        php7-xmlwriter \
        php7-xml \ 
        php7-pdo \ 
        php7-pdo_mysql \
        php-mysqli \
        php-mysqlnd \
        php-simplexml \
        composer \
        npm \
        git

# pass `--build-arg MIGRATE=true` on building to run migrations
ARG MIGRATE
ENV MIGRATE=${MIGRATE}

# pass `--build-arg TEST=true` on building to run tests
ARG TEST
ENV TEST=${TEST}

EXPOSE 80
ENTRYPOINT [ "/bin/bash", "/app/scripts/run.sh" ]
