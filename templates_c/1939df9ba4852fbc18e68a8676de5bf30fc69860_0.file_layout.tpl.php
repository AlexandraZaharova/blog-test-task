<?php
/* Smarty version 5.8.4, created on 2026-10-02 10:40:14
  from 'file:layout.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.4',
  'unifunc' => 'content_6abf8a0e41ada6_88354454',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1939df9ba4852fbc18e68a8676de5bf30fc69860' => 
    array (
      0 => 'layout.tpl',
      1 => 1790937123,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6abf8a0e41ada6_88354454 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/shota/Desktop/blog-test/templates';
?><!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php echo (($tmp = $_smarty_tpl->getValue('title') ?? null)===null||$tmp==='' ? "Блог" ?? null : $tmp);?>
</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <a href="/index.php?page=home">Главная</a>
    </header>
    <main>
        <?php echo $_smarty_tpl->getValue('content');?>

    </main>
</body>
</html><?php }
}
