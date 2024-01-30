FROM php:8.2-apache
WORKDIR /var/www/html

RUN a2enmod rewrite

RUN apt-get update -y && apt-get install -y \
  libicu-dev \
  libmariadb-dev \
  unzip zip \
  zlib1g-dev \
  libpng-dev \
  libjpeg-dev \
  libfreetype6-dev \
  libjpeg62-turbo-dev \
  libpng-dev \
  libzip-dev

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN docker-php-ext-install gettext intl mysqli pdo pdo_mysql gd zip

RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg \
  && docker-php-ext-install -j$(nproc) gd
