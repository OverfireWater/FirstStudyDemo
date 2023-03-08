<?php
include "../DB/DBhelper.php";
$DB=new DBhelper();
if ($_GET){
    $departId=$_GET['departId'];
    $sql="delete from departInfo where departId=?";
    $arr=$DB->add_delete_insert($sql);
    $stmt=$arr->prepare($sql);
    $stmt->bind_param("i",$departId);
    $count=$stmt->execute();
    if ($count>0){
        echo "<script>alert('success');window.location.href='../page/departInfo.php'</script>";
    }else{
        echo "<script>alert('error');history.back();</script>";
    }
}