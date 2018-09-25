# Volunteer Robot
A beta software project from Loving Spoonful forked from [this repository](https://github.com/playasoft/volunteers/) and written using the Laravel 5.6 framework.

## Table of Content

- [Usage](#usage)
  - [Navigation Bar](#navigation-bar)
  - [Dashboard](#dashboard)
  - [Program](#program)
  
- [Features](#features)
  - Notification Email for User
  - Notification Email for Admin
  - Hide empty days feature
  - .env editability
  - CSV export

- [Installation](#installation)
  - [Dependencies](#dependencies)
  - [Installing](#installing)
  - [Setup/Configuration](#setup-and-configuration)
  - [Extra Websocket Steps](#extra-websockets-steps)

## Usage

### Navigation Bar

The Navigation Bar helps you go to different pages on the Volunteer Robot.

![Nav Bar](https://raw.githubusercontent.com/iamkahvi/volunteers/master/laravel/public/img/navbar.png)

**Resources**: These pages are where you will find reading material to educate you on programming and the Volunteer Robot!
- Volunteer Handbook
- Fresh Food Delivery
- GAR Market Booths
- Community Kitchens
- GROW Project
- Gleaning
- Events
- Instructions

**Your Shifts**: This page is where you will find all the shifts you have signed up for; past, present and future.

**Programs**: This page is where you will find all upcoming, ongoing and past programs. 

**[User]**: This page is where will find all your personal details.

**Logout**: Clicking this button logs you out of the Robot.


### Dashboard

The Dashboard is where you will find all upcoming, current and future programs.

<img src="https://raw.githubusercontent.com/iamkahvi/volunteers/master/laravel/public/img/Dashboard.png" align="center"
    width="80%">

### Program

A program page is where you can view if shifts are avaiable and sign up! Remember to use the filters!

<img src="https://raw.githubusercontent.com/iamkahvi/volunteers/master/laravel/public/img/Event.png" align="center"
    width="80%">

## Features

Details coming soon.

## Installation

### Dependencies

1. A webserver that supports PHP (```nginx``` and ```php-fpm``` recommended)
2. ```mysql```
3. ```node.js``` and ```npm``` installed on your system
4. ```composer```, the PHP package manager
5. ```redis```, if you want to use websockets


### Installing

1. Git clone this repo
2. Set **laravel/public/** as your document root
3. Run ```php composer.phar install``` within the **laravel** folder
4. Run ```npm install``` within the **laravel** folder  
5. Set up your environment configuration. See the [Setup / Configuration](#configuration) section below. 
6. Run ```php artisan migrate``` within the **laravel** folder


### Setup and Configuration

1. In the **laravel** folder, copy **.env.example** and rename it to **.env**
2. Configure your database and email settings in the **.env** file
3. run `php artisan key:generate` to generate an application key for Laravel
4. Optionally, configure your queue and broadcast drivers. If you want to use websockets, you'll need to use redis for broadcasting
5. In the **laravel/resources/js/** folder, copy **config.example.js** and rename it to **config.js**
6. Optionally, you may configure your websocket server to use a specific hostname, however by default it will use the current domain of the site
7. Run ```npm run build``` within the **laravel** folder.
8. Run ```php artisan db:seed``` within the **laravel** folder to populate the database with user roles


Alright! Now everything is compiled and the site is functional. You can register accounts, create events, and sign up for shifts.
If you want to use websockets for a couple extra features (auto-updating when shifts are taken or departments are changed), follow these steps:


### Extra websockets steps

1. In your **.env** file, make sure ```redis``` is installed and configured as the broadcast driver, and that the variable WEBSOCKETS_ENABLED is set to true
2. Run ```npm install``` within the **node** folder
3. Ensure that the websocket parameters in  ```laravel/resources/js/config.js``` are correct
4. Run ```node websocket-server.js``` within the **node** folder
5. Use a ```screen``` session or a process manager like ```pm2``` to keep the websocket server running indefinitely

  
