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
        git \
        npm

ARG SEED
ENV SEED=${SEED}

ARG TEST
ENV TEST=${TEST}

ARG WEB_BRANCH
ENV WEB_BRANCH=${WEB_BRANCH}

EXPOSE 80
ENTRYPOINT [ "/bin/bash", "/app/scripts/run.sh" ]
