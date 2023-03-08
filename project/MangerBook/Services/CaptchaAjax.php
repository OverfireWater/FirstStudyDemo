<?php
session_start();
if ($_GET['captcha']){
    $captcha=$_GET['captcha'];
    if ($captcha==$_SESSION['captcha']){
        $statue="success";
    }else{
        $statue="error";
    }
    $statue_json=json_encode($statue);
    echo "{\"result\":[$statue_json]}";
}
