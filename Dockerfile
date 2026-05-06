FROM composer:2.7 AS vendor

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --prefer-dist --no-interaction --no-scripts --optimize-autoloader --ignore-platform-reqs

FROM node:20 AS frontend

WORKDIR /app

COPY package.json package-lock.json ./
RUN npm install

# Copiamos todo el código fuente
COPY . .

# IMPORTANTE: Flux UI necesita archivos que están dentro de la carpeta vendor
# Como vendor está en el .dockerignore, tenemos que traerlo de la etapa anterior
COPY --from=vendor /app/vendor /app/vendor

RUN npm run build

FROM php:8.2-cli-alpine

WORKDIR /app

RUN apk add --no-cache bash postgresql-dev \
    && docker-php-ext-install pdo_pgsql

COPY . .
COPY --from=vendor /app/vendor /app/vendor
COPY --from=frontend /app/public/build /app/public/build

RUN php artisan package:discover --ansi

RUN mkdir -p storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

ENV PORT=8000
EXPOSE 8000

CMD ["sh", "-c", "php artisan migrate --force && php -S 0.0.0.0:${PORT} -t public"]
