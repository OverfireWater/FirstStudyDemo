<?php
include "../DB/DBhelper.php";
session_start();
$DB = new DBhelper();
if ($_POST) {
    $username = $_POST['username'];
    $userpwd = $_POST['userpwd'];
    $userCaptcha = $_POST['userCaptcha'];
    $captcha = $_SESSION['captcha'];
    $sql = "select * from userInfo where username='" . $username . "' and userpwd='" . $userpwd . "'";
    $arr = $DB->queryData($sql);
    if (!empty($arr)) {
        if ($userCaptcha == $captcha) {
            $_SESSION['username']=$username;
            $_SESSION['userId']=$arr[0]['id'];
            $_SESSION['userpwd']=$userpwd;
            echo "success";
        }else{
            echo "Cap_error";
        }
    }else{
        echo "error";
    }
}