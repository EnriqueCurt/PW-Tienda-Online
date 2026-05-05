FROM composer:2.7 AS vendor

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader --ignore-platform-reqs

COPY . .
RUN composer dump-autoload --optimize

FROM php:8.2-cli-alpine

WORKDIR /app

RUN apk add --no-cache bash postgresql-dev \
    && docker-php-ext-install pdo_pgsql

COPY --from=vendor /app /app

RUN mkdir -p storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

ENV PORT=8000
EXPOSE 8000

CMD ["sh", "-c", "php -S 0.0.0.0:${PORT} -t public"]
