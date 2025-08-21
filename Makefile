.PHONY: help build run test analyse format clean docker-build docker-run docker-test docker-analyse

help: ## Показать справку
	@echo "Доступные команды:"
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-20s\033[0m %s\n", $$1, $$2}'

build: ## Установить зависимости
	composer install

run: ## Запустить демонстрацию
	php index.php

test: ## Запустить тесты
	composer test

analyse: ## Запустить статический анализ
	composer analyse

format: ## Форматировать код
	composer format

clean: ## Очистить кэш и временные файлы
	composer dump-autoload --optimize
	rm -f *.log
	rm -rf logs/

docker-build: ## Собрать Docker образ
	docker build -t solid-principles .

docker-run: ## Запустить в Docker
	docker run --rm solid-principles

docker-test: ## Запустить тесты в Docker
	docker run --rm -v $(PWD):/app solid-principles composer test

docker-analyse: ## Запустить анализ в Docker
	docker run --rm -v $(PWD):/app solid-principles composer analyse

docker-compose-up: ## Запустить через docker-compose
	docker-compose up solid-app

docker-compose-down: ## Остановить docker-compose
	docker-compose down

docker-compose-test: ## Запустить тесты через docker-compose
	docker-compose run --rm solid-tests

docker-compose-analyse: ## Запустить анализ через docker-compose
	docker-compose run --rm solid-analysis

all: build test analyse format ## Выполнить все проверки
