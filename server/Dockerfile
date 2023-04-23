FROM php:8.2.4-apache

RUN apt-get update && \
    apt-get install -y libpq-dev && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && docker-php-ext-install pdo_pgsql pgsql

WORKDIR /var/www/html
COPY . .

RUN composer install --no-dev --prefer-dist --no-scripts --no-progress --no-suggest --optimize-autoloader
EXPOSE 80