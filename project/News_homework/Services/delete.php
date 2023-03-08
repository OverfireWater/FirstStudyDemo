<?php
include "../DB/DBhelper.php";
 if($_GET){
     $news_id=$_GET['news_id'];
     $db=new DBhelper();
     $sql="DELETE  from newsinfo where news_id=?";
     $con=$db->Mysql_date($sql);
     $con->multi_query($sql);
     $stmt = $con->prepare($sql);
     $stmt->bind_param('i',$news_id);
     $count = $stmt->execute();
     if ($count>0) {
         echo "<script>alert('删除成功');</script>";
         echo '<script type="text/javascript">window.location.href="../Page/index.php?";</script>';

     } else {
         echo "<script>alert('删除失败');</script>";
         echo '<script type="text/javascript">window.location.href="../Page/index.php";</script>';
     }
 }