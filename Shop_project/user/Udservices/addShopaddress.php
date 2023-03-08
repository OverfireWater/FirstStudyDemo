<?php
session_start();
include "../DB/DBhelper.php";
$db=new DBhelper();
if ($_POST){
    $userId=$_SESSION['userId'];
    $address=$_POST['address'];
    $name=$_POST['name'];
    $tel=$_POST['phone'];
    $sql="insert into shopaddress ( userId, consignee, tel, address) values (?,?,?,?)";
    $con=$db->add_delete_insert($sql);
    $stmt=$con->prepare($sql);
    $stmt->bind_param("isss",$userId,$name,$tel,$address);
    $flag=$stmt->execute();
    if ($flag){
        echo "<script>window.location.href='../PersonalCenter/address.php'</script>";
    }else{
        echo "<script>window.location.href='../PersonalCenter/address.php'</script>";
    }
}