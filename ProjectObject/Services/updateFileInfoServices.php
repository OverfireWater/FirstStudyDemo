<?php
include "../DB/DBhelper.php";
$DB=new DBhelper();
if ($_POST){
    $id=$_POST['id'];
    $date=date("Y-m-d H:i:s");
    $status=$_POST['status'];
    $sql_update="update fileInfo set addtime=?,filestatus=?  where id=?";
    $con=$DB->add_delete_insert($sql_update);
    $stmt=$con->prepare($sql_update);
    $stmt->bind_param("sii",$date,$status,$id);
    $count=$stmt->execute();
    if ($count>0){
        echo "<script>alert('修改成功');window.location.href='../admin/fileInfo.php';</script>";
    }else{
        echo "<script>alert('修改成功');history.back();</script>";
    }
}