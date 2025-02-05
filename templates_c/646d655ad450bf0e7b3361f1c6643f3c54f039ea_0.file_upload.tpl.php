<?php
/* Smarty version 5.4.3, created on 2025-02-05 14:13:21
  from 'file:upload.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_67a363f1059086_67493013',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '646d655ad450bf0e7b3361f1c6643f3c54f039ea' => 
    array (
      0 => 'upload.tpl',
      1 => 1738761199,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
))) {
function content_67a363f1059086_67493013 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\phploginform\\templates';
$_smarty_tpl->renderSubTemplate("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
    <form action="upload" method="post"
            enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" name="Upload">
    </form>

<?php $_smarty_tpl->renderSubTemplate("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
