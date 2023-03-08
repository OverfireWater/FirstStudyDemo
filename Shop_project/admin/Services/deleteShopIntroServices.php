<?php
include "../DB/DBhelper.php";
$db=new DBhelper();
if ($_GET['id']){
    $id=$_GET['id'];
    $con=$db->queryData("select * from shopintroductioninfo where id=".$id);
    $img=$con[0]['Shopimg'];
    unlink($img);
    $sql="delete from shopintroductioninfo where id=?";
    $arr=$db->add_delete_insert($sql);
    $stmt=$arr->prepare($sql);
    $stmt->bind_param("i",$id);
    $count=$stmt->execute();
    if ($count){
        echo "success";
    }
}