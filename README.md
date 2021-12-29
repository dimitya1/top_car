# TopCar

## Table of contents
* [General info](#general-info)
* [Technologies](#technologies)
* [Setup](#setup)

## General info
This project allows users to write new reviews about their cars, view other reviews and like/dislike them.

They can use the system for integration purpose via API. API docs are also provided. 
The integration allows to create a new review, get all reviews and filter them by car model.

There is also an admin panel. Administrators can manage users, reviews, access to API and view interaction with DB in user-friendly mode.

## Technologies
Project is created with:
* PHP: 8
* Laravel: 8
* Docker
* TailwindCSS: 2
* AlpineJS: 3
* Livewire: 2
* MySQL

## Setup

Clone the repository
```
git clone https://github.com/dimitya1/top_car
```
Copy the example env file and make the required configuration changes in the .env file.

If you want to use Telegram notifications in Contact us module,
you should create a new bot with BotFather, add it to a newly created public channel and add the credentials to .env.

Build and run docker containers
```
docker-compose build && docker-compose up -d
```
or
use IDE to build and run docker containers

### Inside the php-fpm container:

- Install all dependencies using composer
```
composer install
```

- Generate the app key
```
php artisan key:generate
```

- Run migrations and seed database
```
php artisan migrate --seed
```

- Create a symbolic link from public/storage to storage/app/public
```
php artisan storage:link
```

- Set up permissions to storage folder (can be different for different operating systems)


- Install the frontend dependencies


- Inside the php-fpm container generate Swagger docs 
```
php artisan l5-swagger:generate
```

## You can now access the server!