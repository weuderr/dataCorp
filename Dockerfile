FROM eboraas/apache-php
MAINTAINER Weuder Martins <weuderrr@gmail.com>

RUN apt-get update && apt-get -y install git curl php5 php5-mcrypt php5-json && apt-get -y autoremove && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN /usr/bin/curl -sS https://getcomposer.org/installer |/usr/bin/php
RUN /bin/mv composer.phar /usr/local/bin/composer
RUN /usr/local/bin/composer create-project laravel/laravel /var/www/laravel --prefer-dist
RUN /bin/chown www-data:www-data -R /var/www/laravel/storage /var/www/laravel/bootstrap/cache

WORKDIR /var/www
CMD php /var/www/artisan serve --port=80 --host=0.0.0.0
EXPOSE 80