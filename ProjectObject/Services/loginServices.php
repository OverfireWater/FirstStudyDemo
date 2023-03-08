<?php
include "../DB/DBhelper.php";
session_start();
$DB=new DBhelper();
if ($_POST){
    $username=$_POST['name'];
    $userpwd=$_POST['password'];
    $captcha=$_POST['captcha'];
    $arr=$DB->queryData("select * from adminInfo where username='".$username."' and userpwd='".$userpwd."'");
    if ($captcha==$_SESSION['captcha'] && $arr>0){
        $status=$arr[0]['userstatus'];
        if ($status==1){
            $_SESSION['adminname']=$username;
            $_SESSION['adminpwd']=$userpwd;
            $id=$arr[0]['id'];
            //获取admin的权限
            $super=$arr[0]['issuper'];
            $_SESSION['adminid']=$id;
            $_SESSION['super']=$super;
            echo "success";
        }else{
            echo "Banned";
        }
    }else if ($arr<=0){
        echo "error";
    }else{
        echo "cap_error";
    }
}