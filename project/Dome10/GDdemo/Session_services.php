<?php
session_start();
if($_GET['text']){
    $text=$_GET['text'];

    if ($text==$_SESSION['auth']){
        $statue="right";
    }else{
        $statue="error";
    }
    echo $statue;
}
//if ($_POST['auth']){
//    $user_auth=$_POST['auth'];
//    $sys_auth=$_SESSION['auth'];
//
//    if ($user_auth==$sys_auth){
//        echo "<script>alert('验证码输入成功');window.location.href='test.html'</script>>";
//    }else{
//        echo "<script>alert('验证码输入失败，点击返回');window.location.href='test.html'</script>>";
//    }
//}
