<?php
include "../DB/DBhelper.php";
session_start();
$DB=new DBhelper();
if ($_POST){
    $username=$_POST['username'];
    $userpwd=$_POST['userpwd'];
    $captcha=$_POST['captcha'];
    $arr=$DB->queryData("select * from userInfo where username='".$username."' and userpwd='".$userpwd."'");
        if ($captcha==$_SESSION['captcha'] && $arr>0){
            $status=$arr[0]['userstatus'];
            if ($status!=0){
                $nickname=$arr[0]['nickname'];
                $_SESSION['username']=$username;
                $_SESSION['userpwd']=$userpwd;
                $id=$arr[0]['id'];
                $_SESSION['id']=$id;
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