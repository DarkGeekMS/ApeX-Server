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
    composer

COPY . /app
WORKDIR /app
EXPOSE 80

# hacky way of letting it running
ENTRYPOINT /bin/bash -c 'while true; do m=5; done;' 