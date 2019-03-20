FROM alpine

RUN apk update
RUN apk add \
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
    dos2unix

COPY . /app
WORKDIR /app

# pass `--build-arg PREPARE=true` on building to run prepares
ARG PREPARE
ENV PREPARE=${PREPARE}

# pass `--build-arg TEST=true` on building to run tests
ARG TEST
ENV TEST=${TEST}

RUN dos2unix scripts/run.sh

EXPOSE 80
ENTRYPOINT [ "/bin/bash", "/app/scripts/run.sh" ]
