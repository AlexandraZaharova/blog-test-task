<?php

class CategoryPage
{
    private const PER_PAGE = 3;

    public static function load(int $categoryId, string $sort, int $page): ?array
    {
        $pdo = Database::connection();

        $catStmt = $pdo->prepare('SELECT id, name, description FROM categories WHERE id = ?');
        $catStmt->execute([$categoryId]);
        $category = $catStmt->fetch();

        if (!$category) {
            return null;
        }

        $orderBy = match ($sort) {
            'views' => 'a.views DESC',
            default => 'a.published_at DESC',
        };

        $countStmt = $pdo->prepare(
            'SELECT COUNT(*) FROM articles a
             JOIN article_category ac ON ac.article_id = a.id
             WHERE ac.category_id = ?'
        );
        $countStmt->execute([$categoryId]);
        $totalArticles = (int) $countStmt->fetchColumn();
        $totalPages = max(1, (int) ceil($totalArticles / self::PER_PAGE));

        $offset = (max(1, $page) - 1) * self::PER_PAGE;

        $articlesStmt = $pdo->prepare(
            "SELECT a.id, a.title, a.description, a.views, a.published_at
             FROM articles a
             JOIN article_category ac ON ac.article_id = a.id
             WHERE ac.category_id = ?
             ORDER BY {$orderBy}
             LIMIT " . self::PER_PAGE . " OFFSET {$offset}"
        );
        $articlesStmt->execute([$categoryId]);
        $articles = $articlesStmt->fetchAll();

        return [
            'category' => $category,
            'articles' => $articles,
            'totalPages' => $totalPages,
        ];
    }
}