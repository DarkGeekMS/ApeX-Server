FROM node:8.16.0-alpine as front
COPY . /app
WORKDIR /app

ARG WEB_BRANCH=master
ENV WEB_BRANCH=${WEB_BRANCH}

RUN apk update &&\
    apk add bash git &&\
    bash /app/scripts/getFront.sh ${WEB_BRANCH}

FROM alpine

COPY --from=front /app /app
WORKDIR /app

RUN apk update &&\ 
    cat scripts/dependencies | xargs apk add &&\ 
    composer install --optimize-autoloader

ARG SEED
ENV SEED=${SEED}

ARG UNIT_TEST
ENV UNIT_TEST=${UNIT_TEST}

ARG E2E_TEST
ENV E2E_TEST=${E2E_TEST}

EXPOSE 80
ENTRYPOINT [ "/bin/bash", "/app/scripts/run.sh" ]
