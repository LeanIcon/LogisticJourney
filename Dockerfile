## Dockerfile for Laravel app (includes SQLite support)
FROM php:8.3-fpm

# Set environment variables
ENV DEBIAN_FRONTEND=noninteractive
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV PATH="/var/www/vendor/bin:$PATH"

# Install required system libraries and sqlite dev
RUN set -eux; \
    apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y --no-install-recommends \
        curl \
        libmemcached-dev \
        libz-dev \
        libpq-dev \
        libjpeg-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libfreetype6-dev \
        libfreetype-dev \
        libssl-dev \
        libwebp-dev \
        libxpm-dev \
        libxpm4 \
        git \
        zip \
        unzip \
        zlib1g-dev \
        libicu-dev \
        build-essential \
        g++ \
        autoconf \
        libxml2-dev \
        libzip-dev \
        pkg-config \
        libsqlite3-dev \
        libonig-dev \
        libcurl4-openssl-dev && \
    rm -rf /var/lib/apt/lists/*

# Install Node.js and npm
RUN curl -sL https://deb.nodesource.com/setup_23.x | bash - && \
    apt-get install -y nodejs && \
    npm install -g npm@11.4.2 && \
    rm -rf /var/lib/apt/lists/*

# Install PHP extensions (include pdo_sqlite & sqlite3)
RUN docker-php-ext-configure gd \
        --with-freetype=/usr/include/ \
        --with-jpeg=/usr/include/ \
        --with-webp=/usr/include/ \
        --with-xpm=/usr/include/ && \
    docker-php-ext-install -j"$(nproc)" \
        gd \
        pdo_mysql \
        pdo_pgsql \
        pdo_sqlite \
        sqlite3 \
        intl \
        soap \
        zip \
        exif \
        bcmath

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www

# Copy composer files first for better layer caching
COPY composer.json composer.lock* ./

# Install PHP dependencies (production build) - MUST succeed
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress

# Copy application files
COPY . .

# Build frontend assets if present (can fail gracefully)
RUN if [ -f package.json ]; then \
        rm -rf node_modules package-lock.json || true; \
        npm install --no-optional && npm run build || true; \
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

# PHP settings
RUN echo "upload_max_filesize=1024M" >> /usr/local/etc/php/conf.d/uploads.ini \
 && echo "post_max_size=1024M" >> /usr/local/etc/php/conf.d/uploads.ini \
 && echo "memory_limit=1024M" >> /usr/local/etc/php/conf.d/uploads.ini \
 && echo "max_execution_time=1800" >> /usr/local/etc/php/conf.d/uploads.ini

EXPOSE 8080

# Start command: don't run destructive migrations by default
CMD ["sh", "-c", "php artisan config:cache && php artisan route:cache && php artisan view:cache && exec php artisan serve --host=0.0.0.0 --port=8080"]