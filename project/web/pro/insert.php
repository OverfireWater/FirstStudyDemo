<?php
include "DBhelper.php";

if ($_POST) {
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

    //查询最大id号
    $sql = "select Book_id from bookinfo group by Book_id  desc limit 0,1";
    $db = new DBhelper();
    $arr_id = $db->quary_date($sql);


    $book_i = $arr_id[0][0];


//    for ($i=0;$i<count($arr_id);$i++){
//        $bk_id=$arr_id[$i];
//    }
//    $arr_id_result=$bk_id->getBookId();

    $sql = "insert into bookinfo values($book_i+1,'" . $bk->getBookName() . "','" .
        $bk->getBookAuthor() . "','" . $bk->getBookDate() . "','" . $bk->getBookIntro() . "','" . $bk->getRemark() . "')";
    //预处理

    $res = $db->insert($sql);

    if ($res) {
        echo "<script>alert('添加成功');</script>";
        echo '<script type="text/javascript">window.location.href="../index.php";</script>';

    } else {
        echo "<script>alert('添加失败');</script>";
        echo '<script type="text/javascript">window.location.href="../index.php";</script>';
    }
}

?>