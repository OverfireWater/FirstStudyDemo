<?php
include "../DB/DBhelper.php";
session_start();
$DB=new DBhelper();
if ($_POST){
    $id=$_POST['name'];
    $ip=$_SERVER['REMOTE_ADDR'];
    $sql_ip="insert into ip values (id,?)";
    $con_ip=$DB->student_add_query($sql_ip);
    $stmt_ip=$con_ip->prepare($sql_ip);
    $stmt_ip->bind_param("s",$ip);
    $stmt_ip->execute();
    $sql="UPDATE student set leader=leader+1 where id=? ";
    $con=$DB->student_add_query($sql);
    $stmt=$con->prepare($sql);
    $stmt->bind_param("i",$id);
    $flag=$stmt->execute();
    if ($flag){
        setcookie("lot","3");
        echo "<script>alert('投票成功');window.location.href='index.php';</script>";
    }
}