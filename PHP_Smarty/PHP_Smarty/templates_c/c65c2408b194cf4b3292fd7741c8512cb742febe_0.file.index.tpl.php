<?php
/* Smarty version 3.1.47, created on 2022-11-17 14:34:40
  from 'D:\phpstudy_pro\WWW\PHP_Smarty\PHP_Smarty\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_6375d600b04439_61781708',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c65c2408b194cf4b3292fd7741c8512cb742febe' => 
    array (
      0 => 'D:\\phpstudy_pro\\WWW\\PHP_Smarty\\PHP_Smarty\\templates\\index.tpl',
      1 => 1668136454,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6375d600b04439_61781708 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<?php
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "configs.conf", null, 0);
?>

<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'title');?>
</title>
</head>
<body bgcolor="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'color');?>
" >

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['value']->value, 'ite', false, 'k');
$_smarty_tpl->tpl_vars['ite']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['ite']->value) {
$_smarty_tpl->tpl_vars['ite']->do_else = false;
?>
    <?php echo $_smarty_tpl->tpl_vars['k']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['ite']->value->getName();?>
,<?php echo $_smarty_tpl->tpl_vars['ite']->value->getSex();?>
,<?php echo $_smarty_tpl->tpl_vars['ite']->value->getTel();?>



<table>
    <tr>
        <td></td>
    </tr>
</table>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</body>
</html><?php }
}
