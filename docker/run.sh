#!/bin/bash
cd /var/www

#if [ "$DB_CONNECTION" = "sqlite" ] ; then \
# touch "$DB_DATABASE"  ; \
#    echo "Database $DB_DATABASE for $DB_CONNECTION driver has been created." ; \
#fi

touch database/database.sqlite

chown www-data:www-data database/database.sqlite
chmod 775 database/database.sqlite

php artisan migrate --force
php artisan cache:clear
php artisan route:cache

php artisan serve --host=0.0.0.0 --port=80
