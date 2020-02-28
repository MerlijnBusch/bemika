### Set up project

####requirements
* PHP 7.2^
* Composer
* Node
* PHPMyAdmin

####Set up project
* Make Sure Composer and PHP are up to date
* Then do the following command in the command prompt ``` composer install```
* This will download all the composer packages
* When that is done do ```npm install && npm run dev```
* to install the node modules and compile them
* Then open the ```.env ``` file and set up the data base MySql example:
* ```        
       DB_CONNECTION=mysql
       DB_HOST=127.0.0.1
       DB_PORT=3306
       DB_DATABASE=bemika
       DB_USERNAME=root
       DB_PASSWORD=```
* also set ```APP_KEY``` to ```APP_KEY=base64:XiZACCniwNfAr0SVpXeNAjAgix7u6XOJP3psxd0JDNU=```
* Then run the following command in the console ```php artisan migrate``` to migrate the database incase there is any error do ``` php artisan migrate:fresh```
* Then run the command ```php artisan serve``` to start the local web server

#### Use full command
* ```php artisan serve``` start the web server
* ```php artisan migrate``` run migration
* ```php artisan migrate:fresh``` drop all current tables and refresh migrations
* ```php artisan``` to see all possible commands
