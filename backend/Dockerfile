FROM php:8.4-fpm-alpine

WORKDIR /var/www/html

# $PHPIZE_DEPS inclui autoconf, g++, make — necessários para pecl install
# --virtual .build-deps agrupa para remoção fácil depois do build
RUN apk add --no-cache \
    git curl zip unzip nginx supervisor \
    postgresql-dev libpng-dev oniguruma-dev \
    libxml2-dev libzip-dev \
    && apk add --no-cache --virtual .build-deps $PHPIZE_DEPS \
    && docker-php-ext-install pdo pdo_pgsql mbstring bcmath zip gd pcntl \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && apk del .build-deps \
    && rm -rf /var/cache/apk/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install --no-dev --optimize-autoloader \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 755 storage bootstrap/cache

COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

RUN mkdir -p /var/log/supervisor /run/nginx

EXPOSE 8000

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
