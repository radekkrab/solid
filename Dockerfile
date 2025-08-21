FROM php:8.2-cli

# Установка системных зависимостей
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    && rm -rf /var/lib/apt/lists/*

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Установка PHP расширений
RUN docker-php-ext-install pdo pdo_mysql

# Создание рабочей директории
WORKDIR /app

# Копирование composer файлов
COPY composer.json composer.lock ./

# Установка зависимостей
RUN composer install --no-dev --optimize-autoloader

# Копирование исходного кода
COPY . .

# Генерация автозагрузчика
RUN composer dump-autoload --optimize

# Создание директории для логов
RUN mkdir -p /app/logs && chmod 777 /app/logs

# Установка прав на файл логов
RUN touch /app/app.log && chmod 666 /app/app.log

# Команда по умолчанию
CMD ["php", "index.php"]
