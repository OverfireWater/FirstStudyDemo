<?php
include "../DB/DBhelper.php";
session_start();
$DB=new DBhelper();
$status=0;
$id=$_SESSION['id'];
$sql_update="update adminInfo set userstatus=? where id=?";
$con=$DB->add_delete_insert($sql_update);
$stmt=$con->prepare($sql_update);
$stmt->bind_param("ii",$status,$id);
$stmt->execute();
$_SESSION =array();
session_destroy();
echo "<script>alert('正在注销中');window.location.href='../admin/login.html'</script>";