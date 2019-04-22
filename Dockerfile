FROM alpine

COPY . /app
WORKDIR /app

RUN apk update
RUN cat scripts/dependencies | xargs apk add

ARG SEED
ENV SEED=${SEED}

ARG UNIT_TEST
ENV UNIT_TEST=${UNIT_TEST}

ARG E2E_TEST
ENV E2E_TEST=${E2E_TEST}

ARG WEB_BRANCH
ENV WEB_BRANCH=${WEB_BRANCH}

EXPOSE 80
ENTRYPOINT [ "/bin/bash", "/app/scripts/run.sh" ]
