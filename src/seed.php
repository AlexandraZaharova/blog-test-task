<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/Database.php';

$pdo = Database::connection();

$categories = [
    ['name' => 'Новости', 'description' => 'Свежие новости проекта'],
    ['name' => 'Технологии', 'description' => 'Статьи про разработку'],
    ['name' => 'Дизайн', 'description' => 'UI/UX и визуал'],
    ['name' => 'Жизнь компании', 'description' => 'Внутренняя кухня'],
];

$catIds = [];
$stmt = $pdo->prepare('INSERT INTO categories (name, description) VALUES (?, ?)');
foreach ($categories as $cat) {
    $stmt->execute([$cat['name'], $cat['description']]);
    $catIds[] = $pdo->lastInsertId();
}

$articleStmt = $pdo->prepare(
    'INSERT INTO articles (title, description, text, image, views, published_at)
     VALUES (?, ?, ?, ?, ?, ?)'
);
$linkStmt = $pdo->prepare(
    'INSERT INTO article_category (article_id, category_id) VALUES (?, ?)'
);

$daysAgo = 0;
foreach ($catIds as $catId) {
    for ($i = 1; $i <= 6; $i++) {
        $title = "Статья $i для категории $catId";
        $publishedAt = date('Y-m-d H:i:s', strtotime("-{$daysAgo} days"));
        $views = rand(5, 500);

        $articleStmt->execute([
            $title,
            "Краткое описание статьи $i",
            "Полный текст статьи номер $i. Здесь может быть сколько угодно текста.",
            '',
            $views,
            $publishedAt,
        ]);
        $articleId = $pdo->lastInsertId();
        $linkStmt->execute([$articleId, $catId]);

        $daysAgo++;
    }
}

echo "Готово: " . count($catIds) . " категорий, " . (count($catIds) * 6) . " статей.\n";