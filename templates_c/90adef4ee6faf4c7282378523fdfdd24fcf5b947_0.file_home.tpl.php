<?php
/* Smarty version 5.8.4, created on 2026-10-02 10:40:14
  from 'file:home.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.4',
  'unifunc' => 'content_6abf8a0e408a90_73218414',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '90adef4ee6faf4c7282378523fdfdd24fcf5b947' => 
    array (
      0 => 'home.tpl',
      1 => 1790937599,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
))) {
function content_6abf8a0e408a90_73218414 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/shota/Desktop/blog-test/templates';
$_smarty_tpl->getSmarty()->getRuntime('Capture')->open($_smarty_tpl, "content", null, null);?>
    <h1>Блог</h1>

    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'category');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('category')->value) {
$foreach0DoElse = false;
?>
        <section>
            <h2><?php echo $_smarty_tpl->getValue('category')['name'];?>
</h2>
            <p><?php echo $_smarty_tpl->getValue('category')['description'];?>
</p>

            <ul>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('category')['posts'], 'post');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('post')->value) {
$foreach1DoElse = false;
?>
                    <li>
                        <a href="/index.php?page=post&id=<?php echo $_smarty_tpl->getValue('post')['id'];?>
"><?php echo $_smarty_tpl->getValue('post')['title'];?>
</a>
                        <p><?php echo $_smarty_tpl->getValue('post')['description'];?>
</p>
                        <small><?php echo $_smarty_tpl->getValue('post')['published_at'];?>
</small>
                    </li>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </ul>

            <a href="/index.php?page=category&id=<?php echo $_smarty_tpl->getValue('category')['id'];?>
">Все статьи →</a>
        </section>
    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);
$_smarty_tpl->getSmarty()->getRuntime('Capture')->close($_smarty_tpl);
$_smarty_tpl->assign('content', $_smarty_tpl->getSmarty()->getRuntime('Capture')->getBuffer($_smarty_tpl, 'content'), false, NULL);
$_smarty_tpl->renderSubTemplate("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
