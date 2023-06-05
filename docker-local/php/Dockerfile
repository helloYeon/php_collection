FROM php:8.1

WORKDIR /usr/share/nginx/html/

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN cp /usr/share/zoneinfo/Asia/Tokyo /etc/localtime \
    && apt-get update \
    && apt-get install -y zip unzip