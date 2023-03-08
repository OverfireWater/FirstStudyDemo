<?php
include "../DB/DBhelper.php";
$db=new DBhelper();
if ($_GET){
    $userId=$_GET['userId'];
    $sql="delete from shopaddress where userId=?";
    $con=$db->add_delete_insert($sql);
    $stmt=$con->prepare($sql);
    $stmt->bind_param("i",$userId);
    $flag=$stmt->execute();
    if ($flag){
        echo "success";
    }else{
        echo "error";
    }
}