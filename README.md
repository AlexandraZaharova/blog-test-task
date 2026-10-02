# Blog Test Task

Простой блог на чистом PHP (без фреймворков) с Smarty и MySQL.

## Стек

- PHP 8.1+
- MySQL
- Smarty (шаблонизатор)
- SCSS (стили)

## Установка

### Вариант A — через Docker (рекомендуется, не требует локальной установки PHP/MySQL)

1. Установить [Docker Desktop](https://www.docker.com/products/docker-desktop/)
2. Клонировать репозиторий и перейти в папку проекта
3. Запустить:
   ```bash
   docker compose up --build -d
   ```
4. Засеять базу тестовыми данными:

   ```bash
   docker compose exec php php src/seed.php
   ```

5. Открыть `http://localhost:8000/index.php?page=home`

### Вариант B — локально, без Docker

Требуется предварительно установленный PHP 8.1+, MySQL 8.0+ и Composer.

**Установка зависимостей по ОС:**

**macOS (Homebrew):**

```bash
brew install php mysql composer
brew services start mysql
```

**Ubuntu / Debian:**

```bash
sudo apt update
sudo apt install php php-mysql php-mbstring mysql-server
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
sudo systemctl start mysql
```

**Windows:**

Рекомендуется [Laragon](https://laragon.org/) или [XAMPP](https://www.apachefriends.org/) — оба включают PHP, MySQL и Composer в одной установке. После установки запустить Apache/MySQL из панели управления Laragon/XAMPP.

Либо вручную: [PHP for Windows](https://windows.php.net/download/), [MySQL Installer](https://dev.mysql.com/downloads/installer/), [Composer for Windows](https://getcomposer.org/download/).

**Далее — одинаково для всех систем:**

1. Клонировать репозиторий и перейти в папку проекта
2. Установить зависимости:
   ```bash
   composer install
   ```
3. Создать базу данных:
   ```bash
   mysql -u root -p -e "CREATE DATABASE blog_test CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
   mysql -u root -p blog_test < config/schema.sql
   ```
4. Настроить подключение к БД в `config/database.php` (логин/пароль от вашей локальной MySQL)
5. Заполнить тестовыми данными:
   ```bash
   php src/seed.php
   ```
6. Запустить сервер:
   ```bash
   php -S localhost:8000 -t public
   ```
7. Открыть `http://localhost:8000/index.php?page=home`

## Структура

- `public/` — точка входа, роутинг
- `src/` — классы работы с данными
- `templates/` — Smarty-шаблоны
- `config/` — конфигурация и SQL-схема

## Функционал

- Главная: категории с 3 последними постами
- Страница категории: список статей, сортировка (дата/просмотры), пагинация
- Страница статьи: полная информация, счётчик просмотров, похожие статьи (по общим категориям)
