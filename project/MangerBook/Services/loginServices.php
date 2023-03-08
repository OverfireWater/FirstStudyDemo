<?php
include "../DB/DBhelper.php";
include "../Enter/UserInfo.php";
session_start();
$user_name=$_POST['username'];
$user_pwd=$_POST['password'];

$db=new DBhelper();
$sql="select * from userInfo where Uname='".$user_name."' and Upwd='".$user_pwd."' ";
$arr=$db->quary_date($sql);
if(count($arr)>0){
    $user=new UserInfo();
    $user->setUname($arr[0][1]);
    $user->setUpwd($arr[0][2]);
    $_SESSION['user']=$user;
    echo "<script>alert('登录成功');window.location.href='../page/index.php'</script>";
}
else{
    echo "<script>alert('登录失败，用户名或密码错误')</script>>";
    echo "<script>window.location.href='../page/login.php'</script>";
}


