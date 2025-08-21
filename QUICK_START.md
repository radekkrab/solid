# 🚀 Быстрый старт

## Локальный запуск

```bash
# Установка зависимостей
composer install

# Запуск демонстрации
php index.php

# Запуск тестов
composer test

# Статический анализ
composer analyse

# Форматирование кода
composer format
```

## Через Makefile

```bash
# Показать все команды
make help

# Выполнить все проверки
make all

# Запустить демонстрацию
make run

# Запустить тесты
make test

# Статический анализ
make analyse

# Форматирование кода
make format
```

## Docker (если доступен)

```bash
# Сборка образа
make docker-build

# Запуск в Docker
make docker-run

# Через docker-compose
docker-compose up solid-app

# Тесты в Docker
docker-compose run --rm solid-tests

# Анализ в Docker
docker-compose run --rm solid-analysis
```

## Что демонстрирует проект

✅ **Single Responsibility Principle** - каждый класс имеет одну ответственность
✅ **Open/Closed Principle** - легко добавлять новые способы оплаты
✅ **Liskov Substitution Principle** - исправлен, Square не наследует Rectangle
✅ **Interface Segregation Principle** - специализированные интерфейсы
✅ **Dependency Inversion Principle** - зависимости через абстракции

## Новые возможности

- 🔒 Валидация данных с информативными ошибками
- 📊 Статистика платежей
- 📝 Расширенное логирование с уровнями
- 🧪 PHPUnit тесты
- 🔍 PHPStan статический анализ
- 🎨 PHP CS Fixer форматирование
- 🐳 Docker поддержка
- 🚀 GitHub Actions CI/CD
- 📋 Makefile команды

## Структура проекта

```
src/                    # Исходный код
├── Solid/             # Реализация SOLID принципов
├── Interfaces/        # Интерфейсы
tests/                  # Тесты
.github/workflows/      # CI/CD
Dockerfile             # Docker образ
docker-compose.yml     # Docker Compose
Makefile               # Команды разработки
```

## Требования

- PHP 8.1+
- Composer 2.0+
- Docker (опционально)

---

**🎯 Готово! Проект демонстрирует профессиональную реализацию SOLID принципов.**
