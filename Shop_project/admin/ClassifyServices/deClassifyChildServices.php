<?php
include "../DB/DBhelper.php";
$db=new DBhelper();
if ($_GET['id']){
    $id=$_GET['id'];
    $sql="delete from shopclassify where id=?";
    $arr=$db->add_delete_insert($sql);
    $stmt=$arr->prepare($sql);
    $stmt->bind_param("i",$id);
    $count=$stmt->execute();
    if ($count){
        echo "success";
    }else{
        echo "error";
    }
}
if ($_GET['parentId']){
    $id=$_GET['parentId'];
    $sql="delete from shopclassify_const where id=?";
    $arr=$db->add_delete_insert($sql);
    $stmt=$arr->prepare($sql);
    $stmt->bind_param("i",$id);
    $count=$stmt->execute();
    if ($count){
        echo "success";
    }else{
        echo "error";
    }
}