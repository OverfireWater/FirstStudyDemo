<?php
include "../DB/DBhelper.php";
$db=new DBhelper();
if ($_POST){
    $shopId=$_POST['shopId'];
    $userId=$_POST['userId'];
    $type_id=$_POST['type_id'];
    $num=$_POST['number'];
    $datetime=date('Y-m-d H:i:s');
    $sql="insert into shopCart (userId, shopId, shopClassify, shopNum, datetime) values(?,?,?,?,?)";
    $con=$db->add_delete_insert($sql);
    $stmt=$con->prepare($sql);
    $stmt->bind_param("iiiis",$userId,$shopId,$type_id,$num,$datetime);
    $stmt->execute();
    if($stmt){
        echo "success";
    }else{
        echo "error";
    }
}

