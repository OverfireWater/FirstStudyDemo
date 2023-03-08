<?php
include "../DB/DBhelper.php";
session_start();
if ($_POST['username'] && $_POST['userpwd']) {
    $username = $_POST['username'];
    $userpwd = $_POST['userpwd'];
    $captcha = $_POST['captcha'];
    $DB = new DBhelper();
    $sql = " select * from  UserInfo where userName='" . $username . "' and userPwd='" . $userpwd . "' ";
    $arr = $DB->queryData($sql);

    $statu="";
    if ($captcha==$_SESSION['captcha'] && $arr>0){
        echo "success";
        $userId=$arr[0]['userId'];
        $_SESSION['username']=$username;
        $_SESSION['userpwd']=$userpwd;
        $_SESSION['userId']=$userId;
    }else if ($arr<=0){
        echo "error";
    }else{
        echo "cap_error";
    }
}