# Imagen base con Apache y PHP
FROM php:8.2-apache

# Instalamos extensiones necesarias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Configuramos Apache
COPY ./src /var/www/html/
WORKDIR /var/www/html

# Configurar permisos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Habilitar mod_rewrite si usas .htaccess
RUN a2enmod rewrite

# Exponer el puerto 80
EXPOSE 80