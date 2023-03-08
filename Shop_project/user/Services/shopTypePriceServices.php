<?php
include "../DB/DBhelper.php";
$db=new DBhelper();
if ($_POST){
    $type_id=$_POST['type_id'];
    $price=$db->queryData("select * from ProductTypeInfo where id=".$type_id);
    echo $price[0]['price'];
}