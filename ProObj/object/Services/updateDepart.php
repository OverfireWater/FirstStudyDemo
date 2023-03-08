<?php
include "../DB/DBhelper.php";
$DB=new DBhelper();
if ($_POST){
    $departId=$_POST['id'];
    $departName=$_POST['name'];
    $departMark=$_POST['remark'];
    $sql="update departinfo set departName=?,departMark=? where departId=?";
    $arr=$DB->add_delete_insert($sql);
    $stmt=$arr->prepare($sql);
    $stmt->bind_param("ssi",$departName,$departMark,$departId);
    $count=$stmt->execute();
    if ($count>0){
        echo "<script>alert('修改成功');window.location.href='../page/departInfo.php'</script>";
    }else{
        echo "<script>alert('修改失败');history.back();</script>";

    }
}
