<?php
include "../DB/DBhelper.php";
$DB=new DBhelper();
if ($_GET){
    $id=$_GET['id'];
    $sql_select="select * from fileInfo where id=".$id;
    $arr_file_name=$DB->queryData($sql_select);
    $file_name=$arr_file_name[0]['truename'];
    $file_uid=$arr_file_name[0]['uid'];
    unlink("../user/File/".$file_uid."/".$file_name);
    $sql="delete from fileInfo where id=?";
    $arr=$DB->add_delete_insert($sql);
    $stmt=$arr->prepare($sql);
    $stmt->bind_param("i",$id);
    $count=$stmt->execute();
    if ($count>0){
        echo "<script>alert('Delete Success');window.location.href='../admin/fileInfo.php';</script>";
    }else{
        echo "<script>alert('Error');history.back();</script>";
    }
}