docker FROM php:7.0-apache

RUN apt-get update

RUN apt-get update && apt-get install -y \
	git \
	vim \
    curl \
    wget \
    pdftk

RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/bin/composer

RUN docker-php-ext-install mbstring mysqli mysqli pdo_mysql

RUN a2enmod rewrite

WORKDIR /var/www/licences
