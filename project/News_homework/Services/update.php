<?php
include "../DB/DBhelper.php";
$db = new DBhelper();
if ($_POST) {
    $news_id=$_POST['news_id'];
    $newsTitle = $_POST['news_title'];
    $newsContent = $_POST['news_content'];
    $newsDate = $_POST['news_date'];
    $newsType = $_POST['news_type'];
    //修改语句
    $sql="update newsinfo set news_title=?,news_content=?,news_date=?,news_type=? where news_id=?";
    $con=$db->Mysql_date($sql);
    $con->multi_query($sql);
    $stmt=$con->prepare($sql);
    $stmt->bind_param('sssii',$newsTitle,$newsContent,$newsDate,$newsType,$news_id);
    $count=$stmt->execute();
    if ($count>0) {
        echo "<script>alert('修改成功');</script>";
    echo '<script type="text/javascript">window.location.href="../Page/index.php";</script>';

    } else {
        echo "<script>alert('修改失败');</script>";
        echo '<script type="text/javascript">window.location.href="../Page/index.php";</script>';
    }
}
