<?php
include "../DB/DBhelper.php";
$DB=new DBhelper();
if ($_POST){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $nickname=$_POST['nickname'];
    $date=$_POST['date'];
    $status=$_POST['status'];
    $sql_update="update userInfo set username=?,nickname=?,regtime=?,userstatus=? where id=?";
    $con=$DB->add_delete_insert($sql_update);
    $stmt=$con->prepare($sql_update);
    $stmt->bind_param("sssii",$name,$nickname,$date,$status,$id);
    $count=$stmt->execute();
    if ($count>0){
        echo "<script>alert('修改成功');window.location.href='../admin/userInfo.php';</script>";
    }else{
        echo "<script>alert('修改成功');history.back();</script>";
    }
}