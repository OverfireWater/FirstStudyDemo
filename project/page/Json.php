<?php
$name=$_GET['name'];
//获取到名称去数据库进行模糊查询
//把查询的结果封装到对象里面
//$arr=["name"=>"admin","sex"=>"M","age"=>"21","tel"=>"15012345678"];
include "../Demo12/Json_services.php";
//如果把对象转换为JSON要保证对象的属性是非私有的
$user=new UserInfo();
$user->setUName("bluce");
$user->setUsex("M");
$user->settel("12345678");
$user1=new UserInfo();
$user1->setUName("jack");
$user1->setUsex("M");
$user1->settel("87654321");
//把查询结果的每个对象都转换为JSON格式的字符串 注意JSON类型字符串的格式
$json_str=json_encode($user);
$json_str1=json_encode($user1);
//对转换完成的json格斯字符串进行像页面反馈
echo  "{\"result\":[$json_str,$json_str1]}";


