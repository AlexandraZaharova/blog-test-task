<?php

class ArticlePage
{
    public static function load(int $articleId): ?array
    {
        $pdo = Database::connection();

        $stmt = $pdo->prepare(
            'SELECT id, title, description, text, image, views, published_at
             FROM articles WHERE id = ?'
        );
        $stmt->execute([$articleId]);
        $article = $stmt->fetch();

        if (!$article) {
            return null;
        }

        self::incrementViews($articleId);
        $article['views']++; // чтобы на экране сразу было видно +1, не дожидаясь перезагрузки

        $similar = self::getSimilar($articleId);

        return [
            'article' => $article,
            'similar' => $similar,
        ];
    }

    private static function incrementViews(int $articleId): void
    {
        $pdo = Database::connection();
        $stmt = $pdo->prepare('UPDATE articles SET views = views + 1 WHERE id = ?');
        $stmt->execute([$articleId]);
    }

    private static function getSimilar(int $articleId): array
    {
        $pdo = Database::connection();

        $stmt = $pdo->prepare(
            'SELECT DISTINCT a.id, a.title, a.description
             FROM articles a
             JOIN article_category ac ON ac.article_id = a.id
             WHERE ac.category_id IN (
                 SELECT category_id FROM article_category WHERE article_id = ?
             )
             AND a.id != ?
             LIMIT 3'
        );
        $stmt->execute([$articleId, $articleId]);

        return $stmt->fetchAll();
    }
}