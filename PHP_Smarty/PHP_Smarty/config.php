<?php
//获取项目根路径
define("BASE_PATH","D:\\phpstudy_pro\\WWW\\PHP_Smarty");
//获取项目路径
define("SMART_PATH","\\PHP_Smarty\\smarty\\");
//引入smarty.class.php
include BASE_PATH.SMART_PATH."Smarty.class.php";
$smarty=new Smarty();
$smarty->template_dir=BASE_PATH.SMART_PATH."templates\\";
$smarty->compile_dir=BASE_PATH.SMART_PATH."templates_c\\";
$smarty->config_dir=BASE_PATH.SMART_PATH."configs\\";
$smarty->left_delimiter="{";
$smarty->right_delimiter="}";
