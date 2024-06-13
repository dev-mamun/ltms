#!/bin/bash
set -e

# Run Laravel commands
php artisan key:generate
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start Apache
apache2-foreground
