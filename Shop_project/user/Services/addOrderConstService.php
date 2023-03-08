<?php
session_start();
include "../DB/DBhelper.php";
$db = new DBhelper();
if ($_POST) {
    $shopId = $_POST['shopId'];
    $userId = $_POST['userId'];
    $type_id = $_POST['type_id'];
    $price = $_POST['price'];
    $number = $_POST['number'];
    $address=$db->queryData("select * from shopaddress where userId=".$_SESSION['userId']);
    $name=$address[0]['consignee'];
    $tel=$address[0]['tel'];
    $address=$address[0]['address'];
    $address=$name." ".$tel." ".$address;
    $datetime = date('Y-m-d H:i:s');
    $status = 1;
    $shipments=0;
    $sql = "insert into orderShopInfo ( userId, shopId, shopClassify, price, shopNum, address, status, shipments, datetime) values(?,?,?,?,?,?,?,?,?)";
    $con = $db->add_delete_insert($sql);
    $stmt = $con->prepare($sql);
    $stmt->bind_param("iiisisiis", $userId, $shopId, $type_id, $price, $number,$address, $status,$shipments, $datetime);
    $flag = $stmt->execute();
    if ($flag) {
        echo "success";
    } else {
        echo "error";
    }
}

