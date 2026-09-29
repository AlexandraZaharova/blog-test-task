<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/Database.php';

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'home':
        echo 'Главная страница (пока пусто)';
        break;
    case 'category':
        echo 'Страница категории (пока пусто)';
        break;
    case 'post':
        echo 'Страница статьи (пока пусто)';
        break;
    default:
        http_response_code(404);
        echo 'Страница не найдена';
}