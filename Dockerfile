FROM php:8.1-cli

# Install MySQL extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Set working directory
WORKDIR /app

# Copy project files
COPY . /app

# Expose Render port
EXPOSE 10000

# Start PHP built-in server on Render's por

