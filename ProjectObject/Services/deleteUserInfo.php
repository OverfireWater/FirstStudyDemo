<?php
include "../DB/DBhelper.php";
$DB=new DBhelper();
if ($_GET){
    $id=$_GET['id'];
    $sql="delete from userInfo where id=?";
    $arr=$DB->add_delete_insert($sql);
    $stmt=$arr->prepare($sql);
    $stmt->bind_param("i",$id);
    $count=$stmt->execute();
    if ($count>0){
        echo "<script>alert('Delete Success');window.location.href='../admin/userInfo.php';</script>";
    }else{
        echo "<script>alert('Error');history.back();</script>";
    }
}