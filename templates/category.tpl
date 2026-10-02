{capture name="content"}
    <h1>{$category.name}</h1>
    <p>{$category.description}</p>

    <div>
        Сортировать:
        <a href="/index.php?page=category&id={$category.id}&sort=date">по дате</a>
        |
        <a href="/index.php?page=category&id={$category.id}&sort=views">по просмотрам</a>
    </div>

    <ul>
        {foreach $articles as $article}
            <li>
                <a href="/index.php?page=post&id={$article.id}">{$article.title}</a>
                <p>{$article.description}</p>
                <small>{$article.published_at} · {$article.views} просмотров</small>
            </li>
        {/foreach}
    </ul>

    <div>
        {for $p=1 to $totalPages}
            {if $p == $currentPage}
                <strong>{$p}</strong>
            {else}
                <a href="/index.php?page=category&id={$category.id}&sort={$sort}&p={$p}">{$p}</a>
            {/if}
        {/for}
    </div>
{/capture}
{assign var="content" value=$smarty.capture.content}
{include file="layout.tpl"}