<?php
include "../DB/DBhelper.php";
if ($_POST['departId']!=""){
    $departId=$_POST['departId'];
    $arr=implode(",",$departId);
    $DB=new DBhelper();
    $sql="delete from departinfo where departId in({$arr})";

    $flag=$DB->add_delete_insert($sql);
    if ($flag){
        echo "<script>alert('Delete Success');window.location.href='../page/departInfo.php'</script>";
    }else{
        echo "<script>alert('Delete Error');history.back();</script>";
    }
}
else{
    echo "<script>alert('There is no data transfer!!!');history.back()</script>";
}