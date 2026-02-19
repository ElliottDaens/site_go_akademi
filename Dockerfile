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
# Stage 2 : application Laravel (PHP 8.4 + nginx via trafex/php-nginx)
# -----------------------------------------------------------------------------
FROM trafex/php-nginx:latest

USER root

RUN apk add --no-cache gettext-envsubst

COPY . /var/www/html
COPY --from=vendor /app/vendor /var/www/html/vendor
COPY --from=frontend /app/public/build /var/www/html/public/build

# Nginx : document root = Laravel public, port = $PORT (Render)
COPY docker/nginx-laravel.conf /etc/nginx/conf.d/default.conf.template
RUN rm -f /etc/nginx/conf.d/default.conf

COPY docker/start.sh /start-app.sh
RUN chmod +x /start-app.sh

RUN chown -R nobody:nobody /var/www/html

ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr

# Démarrer en root pour que start-app.sh puisse écrire la config nginx (PORT)
USER root
EXPOSE 8080
CMD ["/start-app.sh"]
