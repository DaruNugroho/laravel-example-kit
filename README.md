## Livewire


# Install Laravel UI
- composer require laravel/ui
- php artisan ui bootstrap

# Install Admin LTE & Font Awesome
    - composer require "almasaeed2010/adminlte=~3.2"
    - composer require components/font-awesome
    - Import in  : resources/css/app.css
        @import '../../node_modules/bootstrap';
        @import '../../vendor/almasaeed2010/adminlte/dist/css/adminlte.css';
        @import '../../vendor/components/font-awesome/css/all.min.css';