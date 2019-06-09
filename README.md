# ApeX Backend

### Note: Apex is no longer maintained or deployed!
[![Build Status](https://travis-ci.com/DarkGeekMS/ApeX-Server.svg?token=kEyZRKsdTeESZQ8KMgx8&branch=master)](https://travis-ci.com/DarkGeekMS/ApeX-Server)

## Brief Description

Backend code of ApeX, a social media application that mimicks reddit.


## Utilized Technologies 

1) Laravel (A PHP Framework).
2) PHPUnit (For Unit Testing).



## Running Guide (development)

## With Docker:
```
./scripts/runDevDocker.sh [PORT NUMBER] [FRONT END BRANCH] [true to enable seeding]
```

### Native:
```
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate
php artisan DB:seed
php artisan jwt:secret
php artisan storage:link
```

# Deployment Guide (to production machine from your dev machine)

- get a google cloud vm instance

- copy .env.example to vm-instance/apex/.env, keep this file safe!

- create smtp account (i.e. sendgrid) for emails, get your password and add it to /apex/.env

- make your laravel key through `php7 artisan key:generate` and make sure it is added to /apex/.env

- create json key file that has access to vm-instance from gcloud IAM console, put it somewhere safe!

- install gcloud on your dev machine

- update this command with your gcloud vm instance metadata, the path to your  and run it on the root of this repo:

`env PROJECT_ID='<your gcloud project id>' COMPUTE_ZONE='<gcloud compute zone>' VM_INSTANCE='<userName>@<vmName>' BRANCH=master ./scripts/deploy.sh "/path/to/deploy-key.json"`

# Deployment Guide (to production machine from production machine)

follow the first 4 points from the previous guide, clone this repo on your production machine and run this command:

`./scripts/runProdDocker.sh master master apex-production`

