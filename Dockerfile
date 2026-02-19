# -----------------------------------------------------------------------------
# Stage 0 : dépendances PHP (pour que Tailwind puisse scanner les vues Laravel)
# -----------------------------------------------------------------------------
FROM composer:2 AS vendor
WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --no-interaction

COPY . .
RUN composer dump-autoload --optimize --no-dev

# -----------------------------------------------------------------------------
# Stage 1 : build des assets (Vite + Tailwind)
# -----------------------------------------------------------------------------
FROM node:20-alpine AS frontend
WORKDIR /app

COPY package.json package-lock.json ./
RUN npm ci

COPY --from=vendor /app/vendor /app/vendor
COPY resources resources
COPY public public
COPY vite.config.js ./
COPY storage storage
COPY bootstrap bootstrap
COPY config config
COPY app app
COPY routes routes
COPY database database

RUN npm run build

# -----------------------------------------------------------------------------
# Stage 2 : application Laravel (PHP + nginx)
# -----------------------------------------------------------------------------
FROM richarvey/nginx-php-fpm:3.1.6

COPY . /var/www/html
COPY --from=vendor /app/vendor /var/www/html/vendor
COPY --from=frontend /app/public/build /var/www/html/public/build

WORKDIR /var/www/html

ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr
ENV COMPOSER_ALLOW_SUPERUSER 1

COPY docker/start.sh /start-app.sh
RUN chmod +x /start-app.sh

CMD ["/start-app.sh"]
