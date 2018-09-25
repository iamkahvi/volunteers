# Volunteer Robot
A beta software project from Loving Spoonful forked from [this repository](https://github.com/playasoft/volunteers/) and written using the Laravel 5.6 framework.

## Table of Content

- [Usage](#usage)
  - [Navigation Bar](#navigation-bar)
  - [Dashboard](#dashboard)
  - [Program](#program)
  
- [Features](#features)
  - [Notification Emails](#notification-emails)
  - [Detailed Filtering](#detailed-filtering)
  - [Mobile friendly](#mobile-friendly)
  - [User roles](#user-roles)
  - [User uploads](#user-uploads)
  - [History from previous events](#history-from-previous-events)
  - [Customizable shifts](#customizable-shifts)

- [Installation](#installation)
  - [Dependencies](#dependencies)
  - [Installing](#installing)
  - [Setup/Configuration](#setup-and-configuration)
  - [Extra Websocket Steps](#extra-websockets-steps)
  
 - [History](#history)

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

 <img src="https://raw.githubusercontent.com/iamkahvi/volunteers/master/laravel/public/img/Artboard%203.png">
    
### Program

A program page is where you can view if shifts are avaiable and sign up! Remember to use the filters!

<img src="https://raw.githubusercontent.com/iamkahvi/volunteers/master/laravel/public/img/Artboard%201.png">

## Features

### Notification Emails
The robot allows for reminder emails to be sent to users and admins. Scheduling for emails can easily be changed from the .env file while the website is running.

### Detailed Filtering
For programs running for multiple months, filter options include by day, week or department. Additionally, the robot hides days with no shifts.

### CSV Export
The robot provides a CSV export option to download volunteer information and sort data in familiar programs like Microsoft Excel.

### Mobile friendly
This website was developed using the mobile first methodology; all parts of the site are designed to work on phones, tablets, and desktop computers.

### User roles
Every user has specific roles that allow them to take certain shifts. This allows administrators to create medical or fire fighting shifts that only allow approved users.

### User uploads
Users can upload files into their profile to be approved by administrators. This allows users to upload their EMT or fire fighting certification documents.

### History from previous events
This website supports creating multiple events, allowing use by many festivals, or allowing a festival to keep a record of who volunteered in the past.

### Customizable shifts
Event shifts can start and end at any time of day and can be any duration. Instead of being locked into a rigid table, this lets administrators create longer shifts for leads and shorter shifts for miscellaneous jobs.

More details coming soon.

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

## History

Back between late 2014 and early 2015, volunteers from Apogaea were working on making updates to their existing volunteer database. [Rachel Fish](https://github.com/itsrachelfish) is friends with a couple of the developers and was present at a weekend-long hackathon where lots of ideas were shared and code was written aplenty. Unfortunately, when Apogaea was postponed in 2015, development of their volunteer database was postponed as well.

This project was started in November of 2015 as an experiment in learning the Laravel framework. Over time, what started as a learning exercise turned into a fully featured system that might actually be useful to someone. Rachel's previous experience with the old Apogaea database gave her insight into some of the problems the team was facing and inspired her to try something new.
  
