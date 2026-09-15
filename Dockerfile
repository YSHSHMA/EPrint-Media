FROM php:8.2-fpm

# --------------------------------------------------
# System dependencies
# --------------------------------------------------
RUN apt-get update && apt-get install -y \
    nginx \
    supervisor \
    git \
    curl \
    unzip \
    zip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libicu-dev \
    nodejs \
    npm \
    && rm -rf /var/lib/apt/lists/*

# --------------------------------------------------
# PHP extensions
# --------------------------------------------------
RUN docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg

RUN docker-php-ext-install \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip \
    intl

# --------------------------------------------------
# Install Composer
# --------------------------------------------------
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# --------------------------------------------------
# Application directory
# --------------------------------------------------
WORKDIR /var/www

# --------------------------------------------------
# Copy Composer files first
# --------------------------------------------------
COPY composer.json composer.lock ./

RUN composer install \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader \
    --no-scripts

# --------------------------------------------------
# Copy application
# --------------------------------------------------
COPY . .

RUN composer dump-autoload \
    --no-dev \
    --optimize

# --------------------------------------------------
# Frontend dependencies
# --------------------------------------------------
RUN npm install

# Build Vite/assets if package.json has build script
RUN npm run build || true

# --------------------------------------------------
# Laravel permissions
# --------------------------------------------------
RUN mkdir -p \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache

RUN chown -R www-data:www-data \
    storage \
    bootstrap/cache

RUN chmod -R 775 \
    storage \
    bootstrap/cache

# --------------------------------------------------
# Nginx configuration
# --------------------------------------------------
COPY docker/nginx/default.conf /etc/nginx/sites-available/default

# --------------------------------------------------
# Supervisor configuration
# --------------------------------------------------
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# --------------------------------------------------
# Expose HTTP
# --------------------------------------------------
EXPOSE 80

# --------------------------------------------------
# Start Nginx + PHP-FPM
# --------------------------------------------------
CMD ["/bin/bash", "/var/www/docker/start.sh"]