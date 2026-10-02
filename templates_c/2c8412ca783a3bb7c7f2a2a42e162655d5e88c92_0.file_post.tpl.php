<?php
/* Smarty version 5.8.4, created on 2026-10-02 10:42:01
  from 'file:post.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.4',
  'unifunc' => 'content_6abf8a79c91409_19866888',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c8412ca783a3bb7c7f2a2a42e162655d5e88c92' => 
    array (
      0 => 'post.tpl',
      1 => 1790937718,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
))) {
function content_6abf8a79c91409_19866888 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/shota/Desktop/blog-test/templates';
$_smarty_tpl->getSmarty()->getRuntime('Capture')->open($_smarty_tpl, "content", null, null);?>
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
    <?php }
$_smarty_tpl->getSmarty()->getRuntime('Capture')->close($_smarty_tpl);
$_smarty_tpl->assign('content', $_smarty_tpl->getSmarty()->getRuntime('Capture')->getBuffer($_smarty_tpl, 'content'), false, NULL);
$_smarty_tpl->renderSubTemplate("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
