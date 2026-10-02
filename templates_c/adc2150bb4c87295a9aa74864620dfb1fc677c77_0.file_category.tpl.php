<?php
/* Smarty version 5.8.4, created on 2026-10-02 10:42:10
  from 'file:category.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.4',
  'unifunc' => 'content_6abf8a82dd7c52_07581298',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'adc2150bb4c87295a9aa74864620dfb1fc677c77' => 
    array (
      0 => 'category.tpl',
      1 => 1790937710,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
))) {
function content_6abf8a82dd7c52_07581298 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/shota/Desktop/blog-test/templates';
$_smarty_tpl->getSmarty()->getRuntime('Capture')->open($_smarty_tpl, "content", null, null);?>
    <h1><?php echo $_smarty_tpl->getValue('category')['name'];?>
</h1>
    <p><?php echo $_smarty_tpl->getValue('category')['description'];?>
</p>

    <div>
        Сортировать:
        <a href="/index.php?page=category&id=<?php echo $_smarty_tpl->getValue('category')['id'];?>
&sort=date">по дате</a>
        |
        <a href="/index.php?page=category&id=<?php echo $_smarty_tpl->getValue('category')['id'];?>
&sort=views">по просмотрам</a>
    </div>

    <ul>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('articles'), 'article');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('article')->value) {
$foreach0DoElse = false;
?>
            <li>
                <a href="/index.php?page=post&id=<?php echo $_smarty_tpl->getValue('article')['id'];?>
"><?php echo $_smarty_tpl->getValue('article')['title'];?>
</a>
                <p><?php echo $_smarty_tpl->getValue('article')['description'];?>
</p>
                <small><?php echo $_smarty_tpl->getValue('article')['published_at'];?>
 · <?php echo $_smarty_tpl->getValue('article')['views'];?>
 просмотров</small>
            </li>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </ul>

    <div>
        <?php
$_smarty_tpl->assign('p', []);$_smarty_tpl->getVariable('p')->step = 1;$_smarty_tpl->getVariable('p')->total = (int) ceil(($_smarty_tpl->getVariable('p')->step > 0 ? $_smarty_tpl->getValue('totalPages')+1 - (1) : 1-($_smarty_tpl->getValue('totalPages'))+1)/abs($_smarty_tpl->getVariable('p')->step));
if ($_smarty_tpl->getVariable('p')->total > 0) {
for ($_smarty_tpl->getVariable('p')->value = 1, $_smarty_tpl->getVariable('p')->iteration = 1;$_smarty_tpl->getVariable('p')->iteration <= $_smarty_tpl->getVariable('p')->total;$_smarty_tpl->getVariable('p')->value += $_smarty_tpl->getVariable('p')->step, $_smarty_tpl->getVariable('p')->iteration++) {
$_smarty_tpl->getVariable('p')->first = $_smarty_tpl->getVariable('p')->iteration === 1;$_smarty_tpl->getVariable('p')->last = $_smarty_tpl->getVariable('p')->iteration === $_smarty_tpl->getVariable('p')->total;?>
            <?php if ($_smarty_tpl->getValue('p') == $_smarty_tpl->getValue('currentPage')) {?>
                <strong><?php echo $_smarty_tpl->getValue('p');?>
</strong>
            <?php } else { ?>
                <a href="/index.php?page=category&id=<?php echo $_smarty_tpl->getValue('category')['id'];?>
&sort=<?php echo $_smarty_tpl->getValue('sort');?>
&p=<?php echo $_smarty_tpl->getValue('p');?>
"><?php echo $_smarty_tpl->getValue('p');?>
</a>
            <?php }?>
        <?php }
}
?>
    </div>
<?php $_smarty_tpl->getSmarty()->getRuntime('Capture')->close($_smarty_tpl);
$_smarty_tpl->assign('content', $_smarty_tpl->getSmarty()->getRuntime('Capture')->getBuffer($_smarty_tpl, 'content'), false, NULL);
$_smarty_tpl->renderSubTemplate("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
