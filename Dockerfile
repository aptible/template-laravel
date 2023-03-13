FROM php:8.1-apache

WORKDIR /app

# Install dependencies
# git/zip/unzip is required by composer
# libpq-dev is required by PostgreSQL driver
RUN apt-get update && \
    apt-get install -y --no-install-recommends git zip unzip libpq-dev && \
    rm -rf /var/lib/apt/lists/* && \

    # Install php extensions
    docker-php-ext-install pdo_pgsql pdo_mysql && \

    # Install composer (https://getcomposer.org/doc/faqs/how-to-install-composer-programmatically.md)
    composer_install='install-composer.php' && \
    expected_checksum="$(php -r 'copy("https://composer.github.io/installer.sig", "php://stdout");')" && \
    php -r "copy('https://getcomposer.org/installer', '${composer_install}');" && \
    actual_checksum="$(php -r "echo hash_file('sha384', '${composer_install}');")" && \
    ([ "$expected_checksum" = "$actual_checksum" ] || (echo "ERROR: Invalid installer checksum" && exit 1)) && \
    php "$composer_install" --install-dir '/usr/local/bin' --filename composer && \
    rm "$composer_install"

# Install dependencies via composer
ADD composer.json composer.lock ./
RUN composer install --no-dev --no-ansi --no-interaction --no-scripts --no-autoloader

# Add application files and install scripts and autoloader
ADD . ./
RUN composer install --no-dev --no-ansi --no-interaction

# The apache www-data user must be able to access project storage and cache
RUN chown -R www-data:www-data storage/ bootstrap/cache/ && \

    # Link public dir to apache public dir
    rm -rf /var/www/html && ln -s /app/public /var/www/html
