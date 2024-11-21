FROM php:fpm-alpine

ARG UID
ARG GID

ENV UID=${UID}
ENV GID=${GID}

RUN mkdir -p /var/www/html

WORKDIR /var/www/html

RUN addgroup -S -g ${GID} app-runner
RUN adduser -G app-runner --system -D -s /bin/sh -u ${UID} app-runner

RUN sed -i "s/user = www-data/user = app-runner/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = app-runner/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/listen.owner = www-data/listen.owner = app-runner/g" /usr/local/etc/php-fpm.d/www.conf

RUN echo "php_admin_flag[log_errors] = on" >> /usr/local/etc/php-fpm.d/www.conf

RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-enable mysqli pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

USER app-runner

CMD ["php-fpm", "-y", "/usr/local/etc/php-fpm.conf", "-R"]
