# ApeX Backend
[![Build Status](https://travis-ci.com/DarkGeekMS/ApeX-Server.svg?token=kEyZRKsdTeESZQ8KMgx8&branch=master)](https://travis-ci.com/DarkGeekMS/ApeX-Server)

## Brief Description

This is the repository for backend code of ApeX, an application mimicking reddit.


## Utilized Technologies 

1) Laravel (A PHP Framework).
2) PHPUnit (For Unit Testing).



## Installation Guide
```
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate
php artisan DB:seed
php artisan jwt:secret
php artisan storage:link
```

## Host IP
http://35.232.3.8/
