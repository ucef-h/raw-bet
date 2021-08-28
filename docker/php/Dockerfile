FROM php:7.4-fpm

RUN set -xe; \
    apt-get update -yqq && \
    pecl channel-update pecl.php.net && \
    apt-get install -yqq \
      apt-utils \
      libzip-dev zip unzip && \
      docker-php-ext-configure zip &&\
      # Install the zip extension
      docker-php-ext-install zip && \
      php -m | grep -q 'zip'

RUN set -eux; \
    apt-get update; \
    apt-get upgrade -y; \
    apt-get install -y --no-install-recommends \
            curl \
            make \
            cmake \
            git \
            libmemcached-dev \
            libmagickwand-dev \
            imagemagick \
            libz-dev \
            libpq-dev \
            libjpeg-dev \
            libpng-dev \
            libfreetype6-dev \
            libssl-dev \
            libmcrypt-dev \
            libonig-dev; \
    rm -rf /var/lib/apt/lists/*

RUN pecl install imagick && \
    docker-php-ext-enable imagick 

RUN docker-php-ext-configure gd \
            --prefix=/usr \
            --with-jpeg \
            --with-freetype; \
    docker-php-ext-install gd; \
    php -r 'var_dump(gd_info());'

 RUN pecl install -o -f redis  && \
     rm -rf /tmp/pear && \
     docker-php-ext-enable redis 


RUN pecl install memcached-3.1.3 && \
    docker-php-ext-enable memcached 

RUN docker-php-ext-install pdo_mysql

RUN docker-php-ext-install bcmath

RUN apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* && \
    rm /var/log/lastlog /var/log/faillog


    
# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer