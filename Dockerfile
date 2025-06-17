# Use the official PHP image with Apache
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Copy your PHP files to the container
COPY . .

# Enable Apache rewrite module (if needed)
RUN a2enmod rewrite

# Expose port 80
EXPOSE 80