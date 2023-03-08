<?php
include "../DB/DBhelper.php";
$db=new DBhelper();
if ($_POST){
    $shopId=$_POST['shopId'];
    $status=$_POST['status'];
    $sql="update shopInfo set status=? where id=?";
    $con=$db->add_delete_insert($sql);
    $stmt=$con->prepare($sql);
    $stmt->bind_param("ii",$status,$shopId);
    $flag=$stmt->execute();
    if ($flag){
        echo "success";
    }else{
        echo "error";
    }
}