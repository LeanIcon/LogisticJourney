FROM php:8.3-fpm

ENV DEBIAN_FRONTEND=noninteractive
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV PATH="/var/www/vendor/bin:$PATH"

# --------------------------------------------------
# 1. System deps + PHP extensions
# --------------------------------------------------
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libsqlite3-dev \
    libicu-dev \
    zip \
    unzip \
    && docker-php-ext-install \
    pdo_mysql \
    pdo_sqlite \
    mbstring \
    exif \
    pcntl \
    bcmath \
    intl \
    zip \
    sockets \
    opcache \
    && rm -rf /var/lib/apt/lists/*

# --------------------------------------------------
# 2. Node.js (for Vite build)
# --------------------------------------------------
RUN curl -sL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs \
    && rm -rf /var/lib/apt/lists/*

# --------------------------------------------------
# 3. Composer
# --------------------------------------------------
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# --------------------------------------------------
# 4. Copy FULL application (artisan included)
# --------------------------------------------------
COPY . .

# --------------------------------------------------
# 5. Install PHP dependencies
# --------------------------------------------------
RUN composer install \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader

# --------------------------------------------------
# 6. Frontend build
# --------------------------------------------------
RUN npm ci && npm run build && rm -rf node_modules

# --------------------------------------------------
# 7. Storage & permissions
# --------------------------------------------------
RUN mkdir -p storage/app/public \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache \
    && php artisan storage:link || true

# --------------------------------------------------
# 8. PHP production config
# --------------------------------------------------
RUN echo "upload_max_filesize=100M" > /usr/local/etc/php/conf.d/production.ini \
    && echo "post_max_size=100M" >> /usr/local/etc/php/conf.d/production.ini \
    && echo "memory_limit=256M" >> /usr/local/etc/php/conf.d/production.ini \
    && echo "max_execution_time=60" >> /usr/local/etc/php/conf.d/production.ini \
    && echo "opcache.enable=1" >> /usr/local/etc/php/conf.d/production.ini \
    && echo "opcache.validate_timestamps=0" >> /usr/local/etc/php/conf.d/production.ini \
    && echo "expose_php=Off" >> /usr/local/etc/php/conf.d/production.ini

EXPOSE 8080

CMD ["sh", "-c", "php artisan optimize && exec php artisan serve --host=0.0.0.0 --port=8080"]
