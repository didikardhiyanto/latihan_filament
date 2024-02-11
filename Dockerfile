FROM alpine:latest
LABEL maintainer="Samsu Rizal (samsu.rizal.ik@gmail.com)"

WORKDIR /var/www/html/

# Essentials
RUN echo "Asia/Jakarta" > /etc/timezone
RUN apk update
RUN apk add --no-cache zip unzip curl sqlite nginx nano iproute2-ss supervisor mysql-client

# Installing bash
RUN apk add bash
RUN sed -i 's/bin\/ash/bin\/bash/g' /etc/passwd

# Installing PHP
RUN apk add --no-cache php82 \
    php82-common \
    php82-bcmath \
    php82-fpm \
    php82-pdo \
    php82-opcache \
    php82-zip \
    php82-phar \
    php82-iconv \
    php82-cli \
    php82-curl \
    php82-openssl \
    php82-mbstring \
    php82-tokenizer \
    php82-fileinfo \
    php82-json \
    php82-openssl \
    php82-gmp \
    php82-gd \
    php82-gettext \
    php82-dom \
    php82-intl \
    php82-ldap \
    php82-mysqli \
    php82-pgsql \
    php82-xml \
    php82-xmlwriter \
    php82-simplexml \
    php82-dom \
    php82-pdo_mysql \
    php82-pdo_sqlite \
    php82-pdo_pgsql \
    php82-tokenizer \
    php82-pecl-redis

#RUN ln -s /usr/bin/php82 /usr/bin/php
COPY docker/php.ini /etc/php82/php.ini
# Installing composer
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN rm -rf composer-setup.php

# Configure supervisor
RUN mkdir -p /etc/supervisor.d/
COPY docker/supervisord.ini /etc/supervisor.d/supervisord.ini

# Configure PHP
RUN mkdir -p /run/php/
RUN touch /run/php/php8.2-fpm.pid

# Configure nginx
RUN rm -rf /etc/nginx/http.d/default.conf
RUN mkdir /etc/nginx/ssl
COPY docker/nginx.conf /etc/nginx/
COPY docker/nginx-laravel.conf /etc/nginx/http.d/
COPY docker/fullchain.pem /etc/nginx/ssl/
COPY docker/privkey.pem /etc/nginx/ssl/
COPY docker/options-ssl-nginx.conf /etc/nginx/ssl/
COPY docker/ssl-dhparams.pem /etc/nginx/ssl/

# Configure nginx pid
RUN mkdir -p /run/nginx/
RUN touch /run/nginx/nginx.pid

# Building process
COPY . .
RUN cp .env.umkm .env
RUN composer update
RUN chmod -Rv 777 /var/www/html/storage
RUN chmod -Rv 777 /var/www/html/bootstrap
RUN php artisan key:generate
RUN php artisan config:clear
RUN php artisan cache:clear
RUN php artisan view:clear

# Configure nginx log
RUN ln -sf /dev/stdout /var/log/nginx/access.log
RUN ln -sf /dev/stderr /var/log/nginx/error.log

# Expose log
EXPOSE 80

CMD ["supervisord", "-c", "/etc/supervisor.d/supervisord.ini"]