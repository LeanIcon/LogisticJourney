## Minimal Laravel Dockerfile with SQLite support
FROM php:8.3-fpm

# Set environment variables
ENV DEBIAN_FRONTEND=noninteractive
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV PATH="/var/www/vendor/bin:$PATH"

# Install system dependencies
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
    && rm -rf /var/lib/apt/lists/*

# Install Node.js and npm
RUN curl -sL https://deb.nodesource.com/setup_23.x | bash - && \
    apt-get install -y nodejs && \
    npm install -g npm@11.4.2 && \
    rm -rf /var/lib/apt/lists/*

# Install core PHP extensions required by Laravel
RUN docker-php-ext-install \
        pdo_mysql \
        pdo_sqlite \
        mbstring \
        exif \
        pcntl \
        bcmath \
        intl \
        zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy core application files
COPY . .

# Remove development files and configs
RUN rm -rf \
    .git \
    .github \
    .env.example \
    .gitignore \
    .editorconfig \
    README.md \
    phpunit.xml \
    tests \
    config/scribe.php

# Remove Scribe config to prevent package discovery issues
RUN rm -f config/scribe.php

# Install PHP dependencies (production build)
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress --prefer-dist

# Install and build frontend assets if present
RUN if [ -f package.json ]; then \
        npm install --no-optional && \
        npm run build; \
    fi

# Ensure storage and cache dirs exist and are owned by www-data (UID 33)
RUN mkdir -p /var/www/storage/app/public \
             /var/www/storage/framework/cache \
             /var/www/storage/framework/sessions \
             /var/www/storage/framework/views \
             /var/www/storage/logs \
             /var/www/bootstrap/cache && \
    chown -R 33:33 /var/www/storage /var/www/bootstrap/cache && \
    chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Create storage link (allow to fail if already exists)
RUN php artisan storage:link || true

# PHP configuration
RUN echo "upload_max_filesize=1024M" > /usr/local/etc/php/conf.d/uploads.ini \
 && echo "post_max_size=1024M" >> /usr/local/etc/php/conf.d/uploads.ini \
 && echo "memory_limit=1024M" >> /usr/local/etc/php/conf.d/uploads.ini \
 && echo "max_execution_time=1800" >> /usr/local/etc/php/conf.d/uploads.ini

EXPOSE 8080

# Start command
CMD ["sh", "-c", "php artisan config:clear && php artisan route:clear && php artisan view:clear && chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache && php artisan config:cache && php artisan route:cache && php artisan view:cache && exec php artisan serve --host=0.0.0.0 --port=8080"]