<?php

use Smarty\Smarty;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/Database.php';
require __DIR__ . '/../src/Category.php';
require __DIR__ . '/../src/CategoryPage.php';
require __DIR__ . '/../src/ArticlePage.php';

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
        $categoryId = (int) ($_GET['id'] ?? 0);
        $sort = $_GET['sort'] ?? 'date';
        $direction = $_GET['dir'] ?? 'desc';
        $pageNum = max(1, (int) ($_GET['p'] ?? 1));

        $data = CategoryPage::load($categoryId, $sort, $direction, $pageNum);

        if ($data === null) {
            http_response_code(404);
            echo 'Категория не найдена';
            break;
        }

        $smarty->assign('category', $data['category']);
        $smarty->assign('articles', $data['articles']);
        $smarty->assign('sort', $sort);
        $smarty->assign('direction', $direction);
        $smarty->assign('currentPage', $pageNum);
        $smarty->assign('totalPages', $data['totalPages']);
        $smarty->display('category.tpl');
        break;
    case 'post':
        $articleId = (int) ($_GET['id'] ?? 0);

        $article = ArticlePage::load($articleId);

        if ($article === null) {
            http_response_code(404);
            echo 'Статья не найдена';
            break;
        }

        $smarty->assign('article', $article['article']);
        $smarty->assign('similar', $article['similar']);
        $smarty->display('post.tpl');
        break;
    default:
        http_response_code(404);
        echo 'Страница не найдена';
}