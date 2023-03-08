<?php
include "../DB/DBhelper.php";
$db=new DBhelper();
if ($_POST){
    $shopId=$_POST['shopId'];
    $num=$_POST['num'];
    $datetime=date("Y-m-d H:i:s");
    $sql="UPDATE shopCart SET shopNum=?, datetime=? WHERE id=?";
    $con=$db->add_delete_insert($sql);
    $stmt=$con->prepare($sql);
    $stmt->bind_param("isi",$num,$datetime,$shopId);
    $flag=$stmt->execute();
    if ($flag){
        echo "success";
    }else{
        echo "error";
    }
}