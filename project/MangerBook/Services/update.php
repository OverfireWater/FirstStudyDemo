<?php
include "../DB/DBhelper.php";
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
    $bk->setBookId($id);
    $bk->setBookName($name);
    $bk->setBookAuthor($author);
    $bk->setBookDate($date);
    $bk->setBookIntro($intro);
    $bk->setRemark($remark);

    $file=$_FILES['img'];
    add_files($file,$bk->getBookId());
    $file_path="../upload/".$bk->getBookId().".jpg";
    $bk->setBookImg($file_path);

    $sql = "update bookinfo set Book_name='" . $bk->getBookName() . "',Book_Author='" . $bk->getBookAuthor() . "',
    Book_Date='" . $bk->getBookDate() . "',Book_intro='" . $bk->getBookIntro() . "',remark='" . $bk->getRemark() . "',book_img='".$bk->getBookImg()."' where Book_id=" . $bk->getBookId();
    $res = $db->insert($sql);
    if ($res) {
        echo "<script>alert('修改成功');</script>";
//        echo '<script type="text/javascript">window.location.href="../Page/index.php";</script>';
        var_dump($bk->getBookImg());
    } else {
        echo "<script>alert('修改失败');</script>";
        echo '<script type="text/javascript">window.location.href="../Page/index.php";</script>';
    }
}
function add_files($file,$id){

    if ($file['error']>0){
        echo "文件上传失败";
    }
    else{

        $file_path="../upload/".$id.".jpg";
        $file_tmp=$file['tmp_name'];
        if ($file['type']=="image/jpeg" && $file['size']<300000){

                if (move_uploaded_file($file_tmp,$file_path)){
                    echo "上传成功";
                    echo $file_path;
                }

        }else{
            echo "文件大小类型超过能承载的内存";
        }
    }
}
