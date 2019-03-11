FROM alpine

RUN apk update
RUN apk add \
    php7 \
    php7-session \
    php7-fileinfo \
    php7-tokenizer \
    php7-dom \
    php7-xmlwriter \
    php7-xml \ 
    php7-pdo \ 
    php7-pdo_mysql \
    composer

COPY . /app
WORKDIR /app
EXPOSE 80

CMD php7 artisan serve --host=0.0.0.0 --port=80