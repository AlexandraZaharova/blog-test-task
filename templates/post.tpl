<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>{$article.title} — Блог</title>
</head>
<body>
    <a href="/index.php?page=home">← На главную</a>

    <article>
        {if $article.image}
            <img src="{$article.image}" alt="{$article.title}">
        {/if}

        <h1>{$article.title}</h1>
        <p><em>{$article.description}</em></p>
        <small>{$article.published_at} · {$article.views} просмотров</small>

        <div>
            {$article.text}
        </div>
    </article>

    {if $similar|count > 0}
        <section>
            <h2>Похожие статьи</h2>
            <ul>
                {foreach $similar as $item}
                    <li>
                        <a href="/index.php?page=post&id={$item.id}">{$item.title}</a>
                        <p>{$item.description}</p>
                    </li>
                {/foreach}
            </ul>
        </section>
    {/if}
</body>
</html>