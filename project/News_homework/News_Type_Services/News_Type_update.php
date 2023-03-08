<?php
include "../DB/DBhelper.php";
$db = new DBhelper();
if ($_POST) {
    $news_id=$_POST['news_type_id'];
    $newsType = $_POST['news_type_type'];
    //修改语句
    $sql="update newstype set news_type=? where news_id=?";
    $con=$db->Mysql_date($sql);
    $con->multi_query($sql);
    $stmt=$con->prepare($sql);
    $stmt->bind_param('si',$newsType,$news_id);
    $count=$stmt->execute();
    if ($count>0) {
        echo "<script>alert('修改成功');</script>";
        echo '<script type="text/javascript">window.location.href="../NewsType/news_type_index.php";</script>';

    } else {
        echo "<script>alert('修改失败');</script>";
        echo '<script type="text/javascript">window.location.href="../NewsType/news_type_index.php";</script>';
    }
}
