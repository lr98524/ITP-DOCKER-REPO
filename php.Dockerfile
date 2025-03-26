FROM php:8.1.31-fpm-alpine3.21

RUN docker-php-ext-install pdo pdo-mysql