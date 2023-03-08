<?php
include "../DB/DBhelper.php";
session_start();
$DB = new DBhelper();
$id=$_POST['id'];
$name = $_POST['name'];
$classify = $_POST['classify'];
$news = $_POST['news'];
$reCom = $_POST['reCom'];
$remark = $_POST['remark'];
$datetime = date('Y-m-d H:i:s');
$sql_update = "update shopInfo set classifyId=?,shopname=?,vpi=?,recommend=?,datetime=?,remark=? where id=?";
$con = $DB->add_delete_insert($sql_update);
$stmt = $con->prepare($sql_update);
$stmt->bind_param("ssiissi", $classify,  $name, $news, $reCom, $datetime, $remark,$id);
$count = $stmt->execute();
if ($count){
    echo "success";
}

