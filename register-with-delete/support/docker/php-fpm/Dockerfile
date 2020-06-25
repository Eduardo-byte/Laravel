FROM php:7.3-fpm-stretch
WORKDIR "/application"

# Install extensions
RUN docker-php-ext-install pdo pdo_mysql

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN echo "xdebug.remote_enable=1"
RUN echo "xdebug.remote_host=127.0.0.1"
RUN echo "zend_extension='/usr/local/lib/php/extensions/no-debug-non-zts-20180731/xdebug.so'"
RUN echo "xdebug.remote_enable=1"
RUN echo "xdebug.remote_port='9000'"


