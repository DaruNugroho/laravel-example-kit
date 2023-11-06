# Hi Freind !
This is laravel example kit, hope it can help you. (Laravel version : ^10.10)

# Require
- php ^8.1

# Run in Localhost
- Cloning  : `git clone https://github.com/sandifb/laravel-example-kit.git`
- Go to project  : `cd laravel-example-kit`
- Install  : `composer install && npm install`
- Create .env   : `cp .env.example .env` (or copy manualy .env.example to .env)
- Create key .env   : `php artisan key:generate`
- Create Database in your MySql database, use GUI.
- Edit .env file : DB_DATABASE, DB_USERNAME and DB_PASSWORD according your environment
- Migrate Database   : `php artisan migrate`
- Link Storage Folder to public   : `php artisan storage:link`
- Run host : `php artisan serve`
- Open new terminal & Run dev assets : `npm run dev`
- open in browser, by default on [localhost:8000](http://localhost:8000)