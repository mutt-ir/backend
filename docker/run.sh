#!/bin/bash
cd /var/www

if [ "$DB_CONNECTION" = "sqlite" ] ; then
touch "$DB_DATABASE"  ;
echo "Database $DB_DATABASE for $DB_CONNECTION driver has been created." ;
chmod 777 $DB_DATABASE
chown -R www-data:www-data $DB_DATABASE
fi

php artisan migrate --force
php artisan cache:clear
php artisan route:cache

php artisan serve --host=0.0.0.0 --port=80
