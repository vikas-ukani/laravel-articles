<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laravel Articles Create and Updates.



### Features : 
```
Problem Statement 2:

    Create a Create & Edit functionality application in Laravel/MySQL.

    Form contains fields: Article title, Article Body(60 words), Article Image, Category(Sports, Science & Tech, Pop Culture etc.)

```

## Installation Process: 

1. Install via composer
```
composer install 
```

2. DataBase Configuration in `.env`
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_exam
DB_USERNAME=root
DB_PASSWORD=
```

3. Run Composer Script for Dump Database record creating...

```
composer run-fresh
```
- It will wipeing and creating migrate database schema,
- Creating Articles and Category Tables,
- Seed Category data using DB:Seeder.
