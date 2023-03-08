<?php
include "../DB/DBhelper.php";
if ($_POST['employId']!=""){
    $employId=$_POST['employId'];
    $arr=implode(",",$employId);
    $DB=new DBhelper();
    $sql="delete from employee where employeeId in({$arr})";
    $flag=$DB->add_delete_insert($sql);
    if ($flag){
        echo "<script>alert('Delete Success');window.location.href='../page/employInfo.php'</script>";
    }else{
        echo "<script>alert('Delete Error');history.back();</script>";
    }
}else{
    echo "<script>alert('There is no data transfer');history.back();</script>";
}