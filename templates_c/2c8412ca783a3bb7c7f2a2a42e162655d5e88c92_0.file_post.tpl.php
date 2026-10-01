<?php
/* Smarty version 5.8.4, created on 2026-10-01 20:31:37
  from 'file:post.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.4',
  'unifunc' => 'content_6abec329ea2279_15167523',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c8412ca783a3bb7c7f2a2a42e162655d5e88c92' => 
    array (
      0 => 'post.tpl',
      1 => 1790886683,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6abec329ea2279_15167523 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/shota/Desktop/blog-test/templates';
?><!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->getValue('article')['title'];?>
 — Блог</title>
</head>
<body>
    <a href="/index.php?page=home">← На главную</a>

    <article>
        <?php if ($_smarty_tpl->getValue('article')['image']) {?>
            <img src="<?php echo $_smarty_tpl->getValue('article')['image'];?>
" alt="<?php echo $_smarty_tpl->getValue('article')['title'];?>
">
        <?php }?>

        <h1><?php echo $_smarty_tpl->getValue('article')['title'];?>
</h1>
        <p><em><?php echo $_smarty_tpl->getValue('article')['description'];?>
</em></p>
        <small><?php echo $_smarty_tpl->getValue('article')['published_at'];?>
 · <?php echo $_smarty_tpl->getValue('article')['views'];?>
 просмотров</small>

        <div>
            <?php echo $_smarty_tpl->getValue('article')['text'];?>

        </div>
    </article>

    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('similar')) > 0) {?>
        <section>
            <h2>Похожие статьи</h2>
            <ul>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('similar'), 'item');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('item')->value) {
$foreach0DoElse = false;
?>
                    <li>
                        <a href="/index.php?page=post&id=<?php echo $_smarty_tpl->getValue('item')['id'];?>
"><?php echo $_smarty_tpl->getValue('item')['title'];?>
</a>
                        <p><?php echo $_smarty_tpl->getValue('item')['description'];?>
</p>
                    </li>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </ul>
        </section>
    <?php }?>
</body>
</html><?php }
}
