FROM php:8.3-fpm

ENV DEBIAN_FRONTEND=noninteractive
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV PATH="/var/www/vendor/bin:$PATH"

# Install system dependencies and PHP extensions in one layer
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
    && rm -rf /var/lib/apt/lists/*

# Install Node.js
RUN curl -sL https://deb.nodesource.com/setup_23.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm@11.4.2 \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy everything
COPY . .

# Install dependencies and build
RUN composer install --optimize-autoloader --no-interaction --no-progress --prefer-dist \
    && if [ -f package.json ]; then \
        npm install && npm run build || echo "Frontend build failed, continuing..."; \
    fi \
    && mkdir -p storage/app/public \
                 storage/framework/cache \
                 storage/framework/sessions \
                 storage/framework/views \
                 storage/logs \
                 bootstrap/cache \
    && chown -R 33:33 storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache \
    && php artisan storage:link || true

# PHP config
RUN echo "upload_max_filesize=1024M" > /usr/local/etc/php/conf.d/uploads.ini \
 && echo "post_max_size=1024M" >> /usr/local/etc/php/conf.d/uploads.ini \
 && echo "memory_limit=1024M" >> /usr/local/etc/php/conf.d/uploads.ini \
 && echo "max_execution_time=1800" >> /usr/local/etc/php/conf.d/uploads.ini

EXPOSE 8080

CMD ["sh", "-c", "php artisan config:clear && php artisan route:clear && php artisan view:clear && php artisan cache:clear && php artisan blocks:discover && chown -R www-data:www-data storage bootstrap/cache && php artisan optimize && exec php artisan serve --host=0.0.0.0 --port=8080"]