FROM richarvey/nginx-php-fpm:3.1.6

# Copy application files
COPY . .

# Create SQLite database file
RUN touch /var/www/html/database/database.sqlite

# Set permissions for the database directory
RUN chown -R www-data:www-data /var/www/html/database

# Image config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr
ENV APP_URL https://ltms.onrender.com/

# SQLite database configuration
ENV DB_CONNECTION=sqlite
ENV DB_DATABASE=/var/www/html/database/database.sqlite

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

CMD ["/start.sh"]
