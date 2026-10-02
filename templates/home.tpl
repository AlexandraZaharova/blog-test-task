{capture name="content"}
    <h1>Блог</h1>

    {foreach $categories as $category}
        <section>
            <h2>{$category.name}</h2>
            <p>{$category.description}</p>

            <ul>
                {foreach $category.posts as $post}
                    <li>
                        <a href="/index.php?page=post&id={$post.id}">{$post.title}</a>
                        <p>{$post.description}</p>
                        <small>{$post.published_at}</small>
                    </li>
                {/foreach}
            </ul>

            <a href="/index.php?page=category&id={$category.id}">Все статьи →</a>
        </section>
    {/foreach}
{/capture}
{assign var="content" value=$smarty.capture.content}
{include file="layout.tpl"}