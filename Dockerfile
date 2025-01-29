FROM php:8.2-fpm

# Set environment variables
ENV DEBIAN_FRONTEND=noninteractive

# Install dependencies for PHP extensions
RUN apt-get update && apt-get install -y --no-install-recommends \
        curl \
        zip unzip \
        libmemcached-dev \
        libz-dev \
        libpq-dev \
        libjpeg-dev \
        libpng-dev \
        libfreetype6-dev \
        libssl-dev \
        libwebp-dev \
        libxpm-dev \
        libonig-dev \
        libxml2-dev \
        libzip-dev \
        build-essential \
        libgd-dev \
        openssl \
    && rm -rf /var/lib/apt/lists/*

# Install core extensions (json is part of the core)
RUN docker-php-ext-install -j$(nproc) bcmath ctype fileinfo



# Install other extensions
RUN docker-php-ext-install -j$(nproc) mbstring
RUN docker-php-ext-install -j$(nproc) pdo
RUN docker-php-ext-install -j$(nproc) pdo_mysql
RUN docker-php-ext-install -j$(nproc) xml
RUN docker-php-ext-install -j$(nproc) zip
RUN docker-php-ext-install -j$(nproc) gd
RUN apt-get update && apt-get install -y --no-install-recommends \
    default-mysql-client \
    && docker-php-ext-install mysqli || (echo "mysqli extension installation failed" && exit 1)

RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Clean up
RUN apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Expose port for PHP-FPM server
EXPOSE 9000
