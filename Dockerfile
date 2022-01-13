FROM php:8.0.5
RUN apt-get update -y && apt-get install -y openssl libonig-dev git zip unzip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www
COPY . /var/www

RUN composer install

RUN chmod -R 775 storage bootstrap/cache
RUN chmod +x /var/www/docker/run.sh

ENTRYPOINT ["/var/www/docker/run.sh"]
EXPOSE 80
