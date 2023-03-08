<?php
include "../DB/DBhelper.php";
session_start();
$DB=new DBhelper();
if ($_POST){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $password=$_POST['password'];
    $sql="update userInfo set userName=?,userPwd=? where userId=?";
    $arr=$DB->add_delete_insert($sql);
    $stmt=$arr->prepare($sql);
    $stmt->bind_param("ssi",$name,$password,$id);
    $count=$stmt->execute();
    if ($count>0){
        echo "<script>alert('修改成功');</script>";
        echo "<script>window.top.location.reload(); </script>";
    }
    else{
        echo "<script>alert('修改失败');history.back();</script>";
    }
}