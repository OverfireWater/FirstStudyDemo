<?php
include "../DB/DBhelper.php";
session_start();
$DB=new DBhelper();
if ($_POST){
    $id=$_POST['name'];
    $sql="UPDATE student set study=study+1 where id=? ";
    $con=$DB->student_add_query($sql);
    $stmt=$con->prepare($sql);
    $stmt->bind_param("i",$id);
    $flag=$stmt->execute();
    if ($flag){
        setcookie("lot","2");
        echo "<script>alert('投票成功');window.location.href='index.php';</script>";
    }
}