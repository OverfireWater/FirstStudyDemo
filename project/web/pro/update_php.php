<?php
include "DBhelper.php";
$db = new DBhelper();
if ($_POST) {
    $id = $_POST['book_id'];
    $name = $_POST['book_name'];
    $author = $_POST['book_author'];
    $date = $_POST['book_date'];
    $intro = $_POST['message'];
    $remark = $_POST['remark'];
    //封装Bookinfo
    $bk = new BookInfo();
    $bk->setBookName($name);
    $bk->setBookAuthor($author);
    $bk->setBookDate($date);
    $bk->setBookIntro($intro);
    $bk->setRemark($remark);
    $sql = "update bookinfo set Book_name='" . $name . "',Book_Author='" . $author . "',
    Book_Date='" . $date . "',Book_intro='" . $intro . "',remark='" . $remark . "' where Book_id=" . $id;
    $res = $db->insert($sql);
    if ($res) {
        echo "<script>alert('修改成功');</script>";
        echo '<script type="text/javascript">window.location.href="../index.php";</script>';

    } else {
        echo "<script>alert('修改失败');</script>";
        echo '<script type="text/javascript">window.location.href="../index.php";</script>';
    }
}