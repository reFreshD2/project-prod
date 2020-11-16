#!/usr/bin/env bash

cd /var/www/project-prod/

git pull origin master

composer install
chown -R :www-data ../project-prod

php bin/console cache:clear
php bin/console cache:warmup