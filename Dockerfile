FROM composer:latest as builder

WORKDIR /app

COPY composer.* ./

RUN composer install \
    --ignore-platform-reqs \
    --no-plugins \
    --no-scripts \
    --no-dev \
    --prefer-dist \
    --no-autoloader

FROM php:7.4-fpm

WORKDIR /srv

COPY . .
COPY --from=builder /app/vendor /srv/vendor
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip

RUN composer dump-autoload --no-scripts --no-dev --optimize

RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd intl zip

RUN pecl install redis && docker-php-ext-enable redis

EXPOSE 9000

CMD ["php-fpm"]
