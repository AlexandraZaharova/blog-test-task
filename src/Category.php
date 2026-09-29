<?php

class Category
{
    public static function getWithRecentPosts(): array
    {
        $pdo = Database::connection();

        $categories = $pdo->query('SELECT id, name, description FROM categories ORDER BY name')->fetchAll();

        $postsStmt = $pdo->prepare(
            'SELECT a.id, a.title, a.description, a.published_at
             FROM articles a
             JOIN article_category ac ON ac.article_id = a.id
             WHERE ac.category_id = ?
             ORDER BY a.published_at DESC
             LIMIT 3'
        );

        $result = [];
        foreach ($categories as $cat) {
            $postsStmt->execute([$cat['id']]);
            $posts = $postsStmt->fetchAll();

            if (count($posts) > 0) {
                $cat['posts'] = $posts;
                $result[] = $cat;
            }
        }

        return $result;
    }
}