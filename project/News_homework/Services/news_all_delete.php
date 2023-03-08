<?php
include "../DB/DBhelper.php";
$db=new DBhelper();
if($_POST){
    $delete=$_POST['delete'];
    $sql="truncate table newsinfo";
    $con=$db->Mysql_date($sql);
    $con->multi_query($sql);
    $stmt = $con->prepare($sql);
    $count=$stmt->execute();
    if($count>0){
       echo "<script>alert('删除成功')</script>";
        echo '<script >window.location.href="../Page/index.php?";</script>';
    }
}
