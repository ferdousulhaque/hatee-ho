FROM php:fpm

WORKDIR /app

RUN docker-php-ext-install pdo pdo_mysql

RUN pecl install xdebug && docker-php-ext-enable xdebug

COPY ./run.sh /tmp/run.sh

RUN chmod +x /tmp/run.sh

ENTRYPOINT ["/tmp/run.sh"]