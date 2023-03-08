<?php

session_start();
$user = null;
if ($_SESSION['user'] == null) {
    echo "<script>window.location.href='../Page/login.php'</script>>";
} else {
    $user = $_SESSION['user'];
}

include "../DB/DBhelper.php";
 if($_GET){
     $book_id=$_GET['book_id'];

     $db=new DBhelper();
     $sql="DELETE  from bookinfo where Book_id=".$book_id;
     $res = $db->insert($sql);

     if ($res>0) {
         echo "<script>alert('删除成功');</script>";
         echo '<script type="text/javascript">window.location.href="../Page/index.php";</script>';

     } else {
         echo "<script>alert('删除失败');</script>";
         echo '<script type="text/javascript">window.location.href="../Page/index.php";</script>';
     }
 }