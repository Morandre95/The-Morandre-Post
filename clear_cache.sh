!/bin/bash

php artisan cache:clear
php artisan route:clear
php artisan route:cache
php artisan optimize:clear