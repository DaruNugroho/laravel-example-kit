# Hi Freind !
This is laravel example kit, hope it can help you.

# Run in Localhost

- Cloning  : `git clone `
- Install  : `composer install && npm install`
- Create .env   : `cp .env.example .env` (or copy manualy .env.example to .env)
- Create key .env   : `php artisan key:generate`
- Create Database in your MySql database, use GUI.
- Edit /.env file : DB_DATABASE, DB_USERNAME and DB_PASSWORD According to your environment
- Migrate Database   : `php artisan migrate`
- Run host : `php artisan serve`
- Run dev asset : `npm run dev`