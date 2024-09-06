#!/bin/bash
set -e

echo "Deployment started ..."

# Enter maintenance mode or return true
# (php artisan down) || true

# Pull the latest version of the app
git pull

# Install composer dependencies
composer install --optimize-autoloader

# dump autoload composer dependencies
composer dumpautoload

# Clear the old cache
php artisan clear-compiled
php artisan optimize:clear

# Recreate cache
php artisan optimize

# install node dependencies
# npm install

# build npm assets
# npm run build

# set maintenance
php artisan down

# Run database migrations
php artisan migrate --force

# Exit maintenance mode
php artisan up

echo "Deployment finished!"