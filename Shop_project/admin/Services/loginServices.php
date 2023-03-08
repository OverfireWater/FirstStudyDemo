<?php
include "../DB/DBhelper.php";
session_start();
$DB = new DBhelper();
if ($_POST) {
    $username = $_POST['username'];
    $userpwd = $_POST['userpwd'];
    $userCaptcha = $_POST['captcha'];
    $captcha = $_SESSION['admin_captcha'];
    $sql = "select * from adminInfo where username='" . $username . "' and userpwd='" . $userpwd . "'";
    $arr = $DB->queryData($sql);
    if (!empty($arr) > 0) {
        if ($userCaptcha == $captcha) {
            echo "success";
        }else{
            echo "Cap_error";
        }
    }else{
        echo "error";
    }
}