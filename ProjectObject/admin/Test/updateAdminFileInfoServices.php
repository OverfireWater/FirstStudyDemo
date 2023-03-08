<?php
include "../DB/DBhelper.php";
$DB=new DBhelper();
if ($_GET){
    $id=$_GET['id'];
    $date=date("Y-m-d H:i:s");
    $status=$_GET['status'];
    $file_name=$_GET['filename'];
    unlink($file_name);
    $sql_update="update adminfileInfo set addtime=?,filestatus=?  where id=?";
    $con=$DB->add_delete_insert($sql_update);
    $stmt=$con->prepare($sql_update);
    $stmt->bind_param("sii",$date,$status,$id);
    $count=$stmt->execute();
    if ($count>0){
        echo "success";
    }else{
        echo "error";
    }
}