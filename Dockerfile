FROM alpine

COPY . /app
WORKDIR /app

RUN apk update
RUN cat scripts/dependencies | xargs apk add

ARG SEED
ENV SEED=${SEED}

ARG TEST
ENV TEST=${TEST}

ARG WEB_BRANCH
ENV WEB_BRANCH=${WEB_BRANCH}

EXPOSE 80
ENTRYPOINT [ "/bin/bash", "/app/scripts/run.sh" ]
