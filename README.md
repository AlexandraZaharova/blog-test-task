# Blog Test Task

Простой блог на чистом PHP (без фреймворков) с Smarty и MySQL.

## Стек

- PHP 8.1+
- MySQL
- Smarty (шаблонизатор)
- SCSS (стили)

## Установка

1. Клонировать репозиторий
2. Установить зависимости:
   \`\`\`bash
   composer install
   \`\`\`
3. Создать базу данных:
   \`\`\`bash
   mysql -u root -p -e "CREATE DATABASE blog_test CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
   mysql -u root -p blog_test < config/schema.sql
   \`\`\`
4. Настроить подключение к БД в `config/database.php`
5. Заполнить тестовыми данными:
   \`\`\`bash
   php src/seed.php
   \`\`\`
6. Запустить сервер:
   \`\`\`bash
   php -S localhost:8000 -t public
   \`\`\`
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
