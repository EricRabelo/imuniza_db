FROM bitnami/laravel:latest
WORKDIR /tmp/imuniza_db
COPY * .
RUN composer update &&\
php artisan key:generate
CMD php artisan migrate --seed
