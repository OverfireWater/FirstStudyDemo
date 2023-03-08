<?php
include "../DB/DBhelper.php";
session_start();
$DB = new DBhelper();
$name = $_POST['name'];
$classify = $_POST['classify'];
$news = $_POST['news'];
$reCom = $_POST['reCom'];
$remark = $_POST['remark'];
$status = 1;
$file_path=null;
$datetime = date('Y-m-d H:i:s');
//查询最大id
$sql_id = "select * from shopInfo group by id desc limit 0,1  ";
$arr = $DB->queryData($sql_id);
$arr_id = $arr[0]['id'] + 1;
$sql_insert = "insert into shopInfo values(?,?,?,?,?,?,?,?)";
$con = $DB->add_delete_insert($sql_insert);
$stmt = $con->prepare($sql_insert);
$stmt->bind_param("iisiiiss", $arr_id, $classify, $name, $news, $reCom, $status, $datetime, $remark);
$count = $stmt->execute();
if ($count){
    echo "success";
    $_SESSION['shopId'] = $arr_id;
}


