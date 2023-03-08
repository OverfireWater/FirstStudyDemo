<?php
include "../DB/DBhelper.php";
session_start();
$db=new DBhelper();
if ($_POST){
    if ($_POST['id']){
        $shop_id=$_POST['id'];
    }else{
        $shop_id = $_SESSION['shopId'];
    }
    $classify=$_POST['classify'];
    $money=$_POST['money'];
    $datetime=date("Y-m-d H:i:s");
    for ($i=0;$i<count($classify);$i++){
        $sql_id = "select * from producttypeinfo group by id desc limit 0,1  ";
        $arr = $db->queryData($sql_id);
        $arr_id = $arr[0]['id'] + 1;
        $sql="insert into producttypeinfo values(?,?,?,?,?)";
        $con=$db->add_delete_insert($sql);
        $stmt=$con->prepare($sql);
        $stmt->bind_param("iisss",$arr_id,$shop_id,$classify[$i],$money[$i],$datetime);
        $flag=$stmt->execute();
    }
    if ($flag){
        echo "success";
    }
}else{
    echo "error";
}

