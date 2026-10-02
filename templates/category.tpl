{capture name="content"}
    <h1>{$category.name}</h1>
    <p>{$category.description}</p>

    {assign var="dateDir" value=($sort == 'date' && $direction == 'desc') ? 'asc' : 'desc'}
    {assign var="viewsDir" value=($sort == 'views' && $direction == 'desc') ? 'asc' : 'desc'}

    <div>
        Сортировать:
        <a href="/index.php?page=category&id={$category.id}&sort=date&dir={$dateDir}">
            по дате {if $sort == 'date'}{if $direction == 'desc'}↓{else}↑{/if}{/if}
        </a>
        |
        <a href="/index.php?page=category&id={$category.id}&sort=views&dir={$viewsDir}">
            по просмотрам {if $sort == 'views'}{if $direction == 'desc'}↓{else}↑{/if}{/if}
        </a>
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
                <a href="/index.php?page=category&id={$category.id}&sort={$sort}&dir={$direction}&p={$p}">{$p}</a>
            {/if}
        {/for}
    </div>
{/capture}
{assign var="content" value=$smarty.capture.content}
{include file="layout.tpl"}