# Use the official PHP 7.4 Apache base image
FROM php:7.4-apache

# Install PDO MySQL extension
RUN docker-php-ext-install pdo_mysql

# Update package lists and install dependencies
RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y sudo unzip wget

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Enable Apache modules
RUN a2enmod rewrite ssl

# Restart Apache service
RUN service apache2 restart

# Expose port 80 (this is not necessary if you are using docker-compose)
EXPOSE 80
