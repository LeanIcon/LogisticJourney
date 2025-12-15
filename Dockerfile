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
    opcache \
    && rm -rf /var/lib/apt/lists/*

# Install Node.js (LTS version for stability)
RUN curl -sL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy composer files first for better caching
COPY composer.json composer.lock ./

# Install PHP dependencies (production mode)
RUN composer install --optimize-autoloader --no-interaction --no-progress --prefer-dist --no-dev --no-scripts

# Copy package files for npm
COPY package.json package-lock.json ./

# Install Node dependencies and build assets
RUN npm ci && npm run build && rm -rf node_modules

# Copy the rest of the application
COPY . .

# Re-run composer scripts and finalize setup
RUN composer dump-autoload --optimize \
    && mkdir -p storage/app/public \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache \
    && php artisan storage:link || true

# PHP production config
RUN echo "upload_max_filesize=100M" > /usr/local/etc/php/conf.d/production.ini \
    && echo "post_max_size=100M" >> /usr/local/etc/php/conf.d/production.ini \
    && echo "memory_limit=256M" >> /usr/local/etc/php/conf.d/production.ini \
    && echo "max_execution_time=60" >> /usr/local/etc/php/conf.d/production.ini \
    && echo "opcache.enable=1" >> /usr/local/etc/php/conf.d/production.ini \
    && echo "opcache.memory_consumption=128" >> /usr/local/etc/php/conf.d/production.ini \
    && echo "opcache.interned_strings_buffer=8" >> /usr/local/etc/php/conf.d/production.ini \
    && echo "opcache.max_accelerated_files=10000" >> /usr/local/etc/php/conf.d/production.ini \
    && echo "opcache.validate_timestamps=0" >> /usr/local/etc/php/conf.d/production.ini \
    && echo "expose_php=Off" >> /usr/local/etc/php/conf.d/production.ini

# Health check
HEALTHCHECK --interval=30s --timeout=5s --start-period=5s --retries=3 \
    CMD curl -f http://localhost:8080/up || exit 1

EXPOSE 8080

# Production startup: clear caches, optimize, then serve
CMD ["sh", "-c", "php artisan config:clear && php artisan route:clear && php artisan view:clear && php artisan cache:clear && php artisan blocks:discover && chown -R www-data:www-data storage bootstrap/cache && php artisan optimize && exec php artisan serve --host=0.0.0.0 --port=8080"]
