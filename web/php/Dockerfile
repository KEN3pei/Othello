FROM php:7.4-apache
COPY php.ini /usr/local/etc/php/

RUN apt-get update \
  && apt-get install -y zlib1g-dev libpq-dev mariadb-client unzip libzip-dev\
  && docker-php-ext-install zip pdo_mysql mysqli \
  && docker-php-ext-enable mysqli
  
RUN pecl install xdebug \
  && docker-php-ext-enable xdebug 