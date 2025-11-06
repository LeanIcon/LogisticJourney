# ---------------------------------------------------
# Minimal Laravel Dockerfile (PHP 8.3 + Node + MySQL)
# ---------------------------------------------------
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
    netcat-traditional \
    && rm -rf /var/lib/apt/lists/*

# Install Node.js and npm
RUN curl -sL https://deb.nodesource.com/setup_23.x | bash - && \
    apt-get install -y nodejs && \
    npm install -g npm@11.4.2 && \
    rm -rf /var/lib/apt/lists/*

# Install PHP extensions required by Laravel
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

# Set working directory
WORKDIR /var/www

# Copy application files
COPY . .

# Install PHP dependencies (production)
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress --prefer-dist

# Build frontend (optional, skip if no package.json)
RUN if [ -f package.json ]; then \
        npm ci --no-optional && npm run build || true; \
    fi

# Set correct permissions
RUN mkdir -p /var/www/storage/app/public \
             /var/www/storage/framework/cache \
             /var/www/storage/framework/sessions \
             /var/www/storage/framework/views \
             /var/www/storage/logs \
             /var/www/bootstrap/cache && \
    chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache && \
    chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Create storage symlink (ignore if exists)
RUN php artisan storage:link || true

# PHP configuration
RUN echo "upload_max_filesize=1024M" > /usr/local/etc/php/conf.d/uploads.ini \
 && echo "post_max_size=1024M" >> /usr/local/etc/php/conf.d/uploads.ini \
 && echo "memory_limit=1024M" >> /usr/local/etc/php/conf.d/uploads.ini \
 && echo "max_execution_time=1800" >> /usr/local/etc/php/conf.d/uploads.ini

# Expose app port
EXPOSE 8080

# ----------------------------------------------
# Startup script: Wait for DB, migrate, seed, run
# ----------------------------------------------
CMD sh -c '
    echo "Waiting for MySQL at $DB_HOST:$DB_PORT...";
    until nc -z -v -w30 $DB_HOST $DB_PORT
    do
        echo "Waiting for database connection..."
        sleep 5
    done

    echo "✅ Database is up! Running migrations and seeders..."
    php artisan migrate --force || true
    php artisan db:seed --force || true

    echo "🚀 Starting Laravel..."
    php artisan config:cache && php artisan route:cache && php artisan view:cache
    exec php artisan serve --host=0.0.0.0 --port=8080
'
