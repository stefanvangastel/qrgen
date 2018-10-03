FROM php:7.2-apache

# Install packages and PHP 7
ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update -q && apt-get install -qqy \
    libpng-dev && \
    # Delete all the apt list files since they're big and get stale quickly
	rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install gd

COPY . /var/www/html/