FROM php:8.1.12-fpm-buster

RUN apt-get update

# composer でインストールできるように zip 追加
RUN apt-get install -y zip

RUN docker-php-ext-install pdo_mysql
