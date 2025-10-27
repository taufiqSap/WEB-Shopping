# Gunakan image PHP 8.2 dengan semua ekstensi Laravel
FROM php:8.2-fpm

# Install dependencies (mysql, zip, gd, dll)
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer (buat install dependency Laravel)
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Tentukan direktori kerja di dalam container
WORKDIR /var/www/html

# Copy semua file proyek ke dalam container
COPY . .

# Install dependency Laravel
RUN composer install --no-dev --optimize-autoloader

# Generate key dan cache konfigurasi
RUN php artisan key:generate
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Buat link storage ke public
RUN php artisan storage:link || true

# Pastikan folder bisa ditulis
RUN chmod -R 775 storage bootstrap/cache

# Buka port 8000
EXPOSE 8000

# Jalankan Laravel
CMD php artisan serve --host=0.0.0.0 --port=8000
