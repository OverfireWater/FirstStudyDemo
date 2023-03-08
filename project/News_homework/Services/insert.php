<?php
include "../DB/DBhelper.php";

if ($_POST) {
    $newsTitle = $_POST['news_title'];
    $newsContent = $_POST['news_content'];
    $newsDate = $_POST['news_date'];
    $newsType = $_POST['news_type'];

    //查询最大id号
    $sql = "select news_id from newsinfo group by news_id  desc limit 0,1";
    $db = new DBhelper();
    $news_id = $db->query_date($sql);

    $news_id = $news_id[0][0]+1;

    $sql_insert="insert into newsinfo values(?,?,?,?,?)";
    $con=$db->getCon();
    $stmt=$con->prepare($sql_insert);
    $stmt->bind_param('isssi',$news_id,$newsTitle,$newsContent,$newsDate,$newsType);
    $count=$stmt->execute();
    if ($count>0) {
        echo "<script>alert('添加成功');</script>";
        echo '<script type="text/javascript">window.location.href="../Page/index.php";</script>';

    } else {
        echo "<script>alert('添加失败');</script>";
        echo '<script type="text/javascript">window.location.href="../Page/index.php";</script>';
    }

}
?>

