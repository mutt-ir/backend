FROM php:8.0.5
RUN apt-get update -y && apt-get install -y openssl libonig-dev

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www
COPY . /var/www

RUN composer install

ENTRYPOINT ["/var/www/docker/run.sh"]
EXPOSE 80
