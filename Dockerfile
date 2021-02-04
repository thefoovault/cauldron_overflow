FROM php:7.4-fpm-alpine

RUN apk add --no-cache $PHPIZE_DEPS \
    && apk add --no-cache bash \
    && pecl install xdebug-2.9.0 \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install mysqli pdo_mysql \
    && docker-php-ext-enable pdo_mysql

COPY ./config/php/php.ini /usr/local/etc/php/php.ini

ENV PHP_IDE_CONFIG 'serverName=DockerApp'

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
