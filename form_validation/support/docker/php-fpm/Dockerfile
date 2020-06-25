FROM php:7.3-fpm-stretch
WORKDIR "/application"

# Install extensions
RUN docker-php-ext-install pdo pdo_mysql

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN echo "cd xdebug-2.8.1"
RUN echo "./configure"
RUN echo "make"
RUN echo "phpize"
RUN echo "cp modules/xdebug.so /usr/local/lib/php/extensions/no-debug-non-zts-20180731"
RUN echo "xdebug.remote_enable=1"
RUN echo "xdebug.remote_host=127.0.0.1"
RUN echo "zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20180731/xdebug.so"
RUN echo "xdebug.remote_port=9000"


RUN apt-get update && apt-get install -y \
    unixodbc-dev \
    build-essential \
    mysql-client \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    gnupg2 \
    apt-transport-https

