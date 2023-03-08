<?php
include "../DB/DBhelper.php";
if ($_POST['file_id']!=""){
    $file_Id=$_POST['file_id'];
    $arr=implode(",",$file_Id);
    $DB=new DBhelper();
    $sql_delete="delete from userInfo where id in({$arr})";
    $flag=$DB->add_delete_insert($sql_delete);
    if ($flag){
        echo "<script>alert('Delete Success');window.location.href='../admin/userInfo.php'</script>";
    }else{
        echo "<script>alert('Delete Error');history.back();</script>";
    }
}
else{
    echo "<script>alert('There is no data transfer!!!');history.back()</script>";
}