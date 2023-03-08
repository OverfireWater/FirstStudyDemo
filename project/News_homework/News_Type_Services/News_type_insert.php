<?php
include "../DB/DBhelper.php";
if($_POST){
    $news_type=$_POST['news_type_type'];
    $sql = "select news_id from newstype group by news_id  desc limit 0,1";
    $db = new DBhelper();
    $news_type_id = $db->query_date($sql);
    $news_type_id = $news_type_id[0][0]+1;

    $sql_insert="insert into newstype values(?,?)";
    $con=$db->getCon();
    $stmt=$con->prepare($sql_insert);
    $stmt->bind_param('is',$news_type_id,$news_type);
    $count=$stmt->execute();
    if ($count>0) {
        echo "<script>alert('添加成功');</script>";
        echo '<script type="text/javascript">window.location.href="../NewsType/news_type_index.php";</script>';

    } else {
        echo "<script>alert('添加失败');</script>";
        echo '<script type="text/javascript">window.location.href="../NewsType/news_type_index.php";</script>';
    }
}
?>