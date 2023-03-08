<?php
include "../DB/DBhelper.php";
$DB=new DBhelper();
if ($_POST){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $telphone=$_POST['telphone'];
    $date=$_POST['date'];
    $status=$_POST['status'];
    $super=$_POST['super'];
    $sql_update="update adminInfo set username=?,telphone=?,datetime=?,issuper=?,userstatus=? where id=?";
    $con=$DB->add_delete_insert($sql_update);
    $stmt=$con->prepare($sql_update);
    $stmt->bind_param("sssiii",$name,$telphone,$date,$super,$status,$id);
    $count=$stmt->execute();
    if ($count>0){
        echo "<script>alert('修改成功');window.location.href='../admin/adminInfo.php';</script>";
    }else{
        echo "<script>alert('修改成功');history.back();</script>";
    }
}