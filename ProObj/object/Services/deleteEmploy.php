<?php
include "../DB/DBhelper.php";
$DB=new DBhelper();
if ($_GET['employId']){
    $employId=$_GET['employId'];
    $sql="delete from employee where employeeId=?";
    $arr=$DB->add_delete_insert($sql);
    $stmt=$arr->prepare($sql);
    $stmt->bind_param("i",$employId);
    $count=$stmt->execute();
    if ($count>0){
        echo "<script>alert('success');window.location.href='../page/employInfo.php'</script>";
    }else{
        echo "<script>alert('error');history.back();</script>";
    }
}