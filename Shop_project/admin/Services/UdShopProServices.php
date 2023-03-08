<?php
include "../DB/DBhelper.php";
session_start();
$db=new DBhelper();
if ($_POST){
    $shop_id=$_POST['id'];
    $classify=$_POST['classify-data'];
    $money=$_POST['money-data'];
    $datetime=date("Y-m-d H:i:s");
    for ($i=0;$i<count($classify);$i++){
        $sql="UPDATE producttypeinfo SET productType=?, price=?, datetime=? WHERE id=?;";
        $con=$db->add_delete_insert($sql);
        $stmt=$con->prepare($sql);
        $stmt->bind_param("sssi",$classify[$i],$money[$i],$datetime,$shop_id[$i]);
        $flag=$stmt->execute();
    }
    if ($flag){
        echo "success";
    }
}else{
    echo "error";
}

