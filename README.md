# ApeX Backend

### Note: Apex is no longer maintained or deployed!
[![Build Status](https://travis-ci.com/DarkGeekMS/ApeX-Server.svg?token=kEyZRKsdTeESZQ8KMgx8&branch=master)](https://travis-ci.com/DarkGeekMS/ApeX-Server)

## Brief Description

Backend code of ApeX, a social media application that mimicks reddit.


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
