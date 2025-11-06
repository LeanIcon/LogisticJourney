## Multi-stage Laravel Dockerfile with SQLite support
FROM php:8.3-fpm AS builder

ENV DEBIAN_FRONTEND=noninteractive
ENV COMPOSER_ALLOW_SUPERUSER=1

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

# Install PHP extensions
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

# Copy dependency files first for better layer caching
COPY composer.json composer.lock ./
COPY package.json package-lock.json* ./

# Install ALL dependencies (including dev) for build phase
RUN composer install --optimize-autoloader --no-interaction --no-progress --prefer-dist

# Install npm dependencies if package.json exists
RUN if [ -f package.json ]; then npm ci --no-optional; fi

# Copy application files
COPY . .

# Build frontend assets
RUN if [ -f package.json ]; then npm run build || true; fi

# Generate optimized production autoloader (removes dev dependencies)
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress --prefer-dist && \
    composer dump-autoload --optimize --no-dev

# Create storage link
RUN php artisan storage:link || true

# --- Final production image ---
FROM php:8.3-fpm

ENV DEBIAN_FRONTEND=noninteractive
ENV PATH="/var/www/vendor/bin:$PATH"

# Install runtime dependencies only (smaller footprint)
RUN apt-get update && apt-get install -y \
        libpng16-16 \
        libonig5 \
        libxml2 \
        libzip4 \
        libsqlite3-0 \
        libicu72 \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install \
        pdo_mysql \
        pdo_sqlite \
        mbstring \
        exif \
        pcntl \
        bcmath \
        intl \
        zip

WORKDIR /var/www

# Copy built application from builder stage
COPY --from=builder --chown=33:33 /var/www /var/www

# Ensure proper permissions and directory structure
RUN mkdir -p storage/app/public \
             storage/framework/cache \
             storage/framework/sessions \
             storage/framework/views \
             storage/logs \
             bootstrap/cache && \
    chown -R 33:33 storage bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache

# PHP configuration
RUN echo "upload_max_filesize=1024M" > /usr/local/etc/php/conf.d/uploads.ini \
 && echo "post_max_size=1024M" >> /usr/local/etc/php/conf.d/uploads.ini \
 && echo "memory_limit=1024M" >> /usr/local/etc/php/conf.d/uploads.ini \
 && echo "max_execution_time=1800" >> /usr/local/etc/php/conf.d/uploads.ini \
 && echo "max_input_time=1800" >> /usr/local/etc/php/conf.d/uploads.ini

EXPOSE 8080

# Health check
HEALTHCHECK --interval=30s --timeout=3s --start-period=40s --retries=3 \
    CMD php artisan inspire || exit 1

# Start command
CMD ["sh", "-c", "php artisan config:clear && php artisan route:clear && php artisan view:clear && chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache && php artisan config:cache && php artisan route:cache && php artisan view:cache && exec php artisan serve --host=0.0.0.0 --port=8080"]