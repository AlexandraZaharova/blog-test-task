<?php

use Smarty\Smarty;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/Database.php';
require __DIR__ . '/../src/Category.php';

$smarty = new Smarty();
$smarty->setTemplateDir(__DIR__ . '/../templates');
$smarty->setCompileDir(__DIR__ . '/../templates_c');
$smarty->setCacheDir(__DIR__ . '/../cache');

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'home':
        $smarty->assign('categories', Category::getWithRecentPosts());
        $smarty->display('home.tpl');
        break;
    case 'category':
        echo 'Страница категории (день 3)';
        break;
    case 'post':
        echo 'Страница статьи (день 4)';
        break;
    default:
        http_response_code(404);
        echo 'Страница не найдена';
}