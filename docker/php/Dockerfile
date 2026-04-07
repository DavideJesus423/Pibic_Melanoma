# 1️⃣ Base PHP-FPM
FROM php:8.4-fpm

# 2️⃣ Variáveis para usuário
ARG WWWUSER=1000
ARG WWWGROUP=1000
ARG APP_DIR=/var/www

# 3️⃣ Instala dependências do sistema e PHP
RUN apt-get update && apt-get install -y \
        bash \
        git \
        curl \
        unzip \
        libzip-dev \
        libpng-dev \
        libonig-dev \
        libjpeg-dev \
        libfreetype6-dev \
        libxml2-dev \
        zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip mbstring xml \
    && rm -rf /var/lib/apt/lists/*

# 4️⃣ Criar usuário www-data (se não existir) com UID/GID do host
RUN id -u www-data >/dev/null 2>&1 || adduser -D -u $WWWUSER -G www-data www-data

# 5️⃣ Criar diretório da aplicação e ajustar permissões
RUN mkdir -p $APP_DIR \
    && chown -R www-data:www-data $APP_DIR \
    && chmod -R ug+rwx $APP_DIR

WORKDIR $APP_DIR

# 6️⃣ Instala Composer global
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# 7️⃣ Expõe a porta do PHP-FPM
EXPOSE 9000

# 8️⃣ Usuário padrão
USER www-data


ENTRYPOINT ["sh", "-c", "php artisan migrate --force && php-fpm"]