FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git zip unzip

RUN apt-get clean
RUN rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_mysql

ENV COMPOSER_ALLOW_SUPERUSER=1

COPY --from=composer:2.4 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY composer.* ./

RUN composer install --prefer-dist --no-dev --no-scripts --no-progress --no-interaction

COPY app ./app
COPY core ./core
COPY public ./public
COPY .env ./.env

RUN composer dump-autoload

CMD ["php", "-S", "0.0.0.0:3000", "-t", "public"]
