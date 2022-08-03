FROM bitnami/laravel:latest
WORKDIR /app
COPY * .
RUN composer update
RUN php artisan key:generate
RUN php artisan migrate --seed
