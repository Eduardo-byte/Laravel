#!/bin/sh

# activate maintenance mode
php ./application/artisan down

# reset local changes
git checkout master && git reset --hard origin/master

# update source code
git pull

# update PHP dependencies
composer install -d=./application --no-interaction --prefer-dist

# update node dependencies
npm run production --prefix ./application

# -d=./application Laravel directory
# --no-interaction Do not ask any interactive question
# --prefer-dist Forces installation from package dist even for dev versions.

# update database
php ./application/artisan migrate --force

# --force  Required to run when in production.

# stop maintenance mode
php ./application/artisan up