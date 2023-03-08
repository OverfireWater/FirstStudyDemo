<?php
include "../DB/DBhelper.php";
$DB=new DBhelper();
if ($_GET){
    $id=$_GET['id'];
//    $sql="select * from shopInfo where id=".$id;
//    $con=$DB->queryData($sql);
//    $file_name=$con[0]['picture'];
//    unlink($file_name);
    $sql="delete from shopInfo where id=?";
    $arr=$DB->add_delete_insert($sql);
    $stmt=$arr->prepare($sql);
    $stmt->bind_param("i",$id);
    $count=$stmt->execute();
    if ($count){
        echo "<script>window.location.replace('../page/Products_List.php');</script>";
    }
}