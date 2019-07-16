# **Laravel-installer**
[![StyleCI](https://github.styleci.io/repos/196404913/shield?branch=master)](https://github.styleci.io/repos/196404913)

## Table of contents
* [General info](#general-info)
* [Technologies](#technologies)
* [Requirements](#requirements)
* [Setup](#setup)
* [Features](#features)
* [Screenshots](#screenshots)
* [Status](#status)
* [Contact](#contact)

## General info
Laravel-installer is a web installer for web applications. It allows users to check required packages for PHP and Apache, check folder's permissions, save main setting to .env file and create new account to your Laravel app. 

## Technologies
* PHP - version 7.2 (min. 7.0)
* Laravel - version 5.8 (min. 5.4)

## Requirements
* Laravel - version 5.4+
* PHP - version 7.0+

## Setup
1. Run composer command
```bash
composer require RazorMeister/laravel-installer
```
2. In `config/app.php` add to providers the following line
```php
RazorMeister\Installer\InstallerProvider::class,
```
3. Publish views, assets and config using command:
```bash
php artisan vendor:publish --tag=laravelInstaller
```

## Code Examples
Enter to the url
`http://your-domain/install/`
and follow the steps :smile:

## Features
List of features ready and TODOs for future development
* Checking required packages
* Checking files and folders permissions
* Saving settings to .env file and running migrations and seeders
* Creating new user

ToDo list:
* Make email notification after successful installation

## Screenshots
![Example screenshot](https://imgur.com/zoKTcIL.png)

![Example screenshot](https://imgur.com/3A1G5J0.png)

![Example screenshot](https://imgur.com/EIcwREi.png)

## Status
Project is: _in progress_.

## Inspiration
Project based on https://github.com/rashidlaasri/LaravelInstaller.

## Contact
Created by [@RazorMeister](https://www.razormeister.pl/) - feel free to contact me!