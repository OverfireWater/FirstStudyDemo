<?php
include "Lovely.php";
$man=new man("张三","男","18","2004-02-15",true,true,"180000");
$woman=new woman("李四","女","28","2005-03-13");
$test=new Love_test($man,$woman);
$test->test();