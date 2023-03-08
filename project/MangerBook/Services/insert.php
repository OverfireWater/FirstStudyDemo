<?php
include "../DB/DBhelper.php";

if ($_POST) {
    $name = $_POST['book_name'];
    $author = $_POST['book_author'];
    $date = $_POST['book_date'];
    $intro = $_POST['message'];
    $remark = $_POST['remark'];
    //添加图片


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
    $book_id = $arr_id[0][0] + 1;

    $file = $_FILES['img'];
    add_files($file, $book_id);
    $file_path = "../upload/" . $book_id . ".jpg";
    $bk->setBookImg($file_path);
    $sql = "insert into bookinfo values($book_id,'" . $bk->getBookName() . "','" .
        $bk->getBookAuthor() . "','" . $bk->getBookDate() . "','" . $bk->getBookIntro() . "','" . $bk->getRemark() . "','" . $bk->getBookImg() . "')";
    //预处理

    $res = $db->insert($sql);

    if ($res) {
        echo "<script>alert('添加成功');</script>";
        echo '<script type="text/javascript">window.location.href="../Page/index.php";</script>';


    } else {
        echo "<script>alert('添加失败');</script>";
        echo '<script type="text/javascript">window.location.href="../Page/index.php";</script>';
    }
}
function add_files($file, $id)
{

    if ($file['error'] > 0) {
        echo "文件上传失败";
    } else {

        $file_path = "../upload/" . $id . ".jpg";
        $file_tmp = $file['tmp_name'];
        if ($file['type'] == "image/jpeg") {
            if (file_exists($file_path)) {
                echo "上传失败";
            } else {
                if (move_uploaded_file($file_tmp, $file_path)) {

                    //获取文件路径
                    $info = getimagesize($file_path);
                    //创建图片对象
                    $type=image_type_to_extension($info[2],false);
                    $image_c="imagecreatefrom{$type}";
                    $image=$image_c($info);

                    //创建图片颜色
                    $color = imagecolorallocatealpha($image, 0, 0, 0, 0);
                    //水印字体
                    $content = "Kuang_you";
                    //文字路径
                    $font = "E:\\ALGER.TTF";
                    //加水印
                    imagettftext($image, 120, 0, $info[0] / 4, $info[1] / 2, $color, $font, $content);
                    imagejpeg($image, $file_path);
                    imagedestroy($image);
                }
            }
        } else {
            echo "文件大小类型超过能承载的内存";
        }
    }
}

?>