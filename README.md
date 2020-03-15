# bemika

## Steps to set up
* composer install
* npm install && npm run dev
* copy the env.example and setup the env variables to connect to database
* php artisan migrate
* then do php artisan serve

## use full commands
* ``php artisan migrate:fresh`` drop all tables and remigrate the database
* ``php artisan serve`` start up the web server
* ``composer install`` install new composer dependencies
* ``npm run watch`` enable the watcher only use full when working on ``js or sass``
* ``npm install`` install node packages

## Folder structure
``.env`` put in folder for all env variables if this files doesnt exit copy the ``.env.example`` and set all the env variables correct

### Public
* compiled js
* compiled css
* the images go there when uploaded
* dont change any other stuff in public folder

### web routes
* ``/routes/web`` are all the application routes

### Resources
* ``/resources/js`` are all the js for example vue components
* ``/resources/sass`` are all the css for the application
* ``/resources/lang`` are all the language translation for the application
* ``/resources/views`` is the html (blades)
* ``/resources/views/layouts`` is the main layout like ``main, navbar, sidebar``
* ``/resources/views/auth`` are the auth views
* ``/resources/views/error`` are the http error codes
* ``/resources/views/vendor/notification/email.blade.php`` what the user gets in the mail inbox 
* ``/resources/views/partials`` all other views
* ``/resources/views/index`` the index first screen before login
* ``/resources/views/dashboard`` the dashboard

### Models
* ``app/Model.php`` for example ``app/User.php``
* to add model ``php artisan make:model Name.php``

### Controller
* ``app/Http/Controller`` Are all the controllers
* to add controller ``php artisan make:controller NameController``

### Database
* ``database/migration`` are all the migrations
* to add migration ``php artisan make:migration create_name``

### Middlewares
* ``app/Http/Middleware`` where are the middlewares are
* to add middleware ``php artisan make:middleware Name`` also add it into the kernel.php to register the middleware



 

