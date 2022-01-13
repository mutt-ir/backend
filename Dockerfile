FROM php:8.0.5
RUN apt-get update -y && apt-get install -y openssl libonig-dev git zip unzip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www
COPY . /var/www

RUN composer install

RUN chown -R www-data:www-data storage bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache

ENTRYPOINT ["/var/www/docker/run.sh"]
EXPOSE 80
