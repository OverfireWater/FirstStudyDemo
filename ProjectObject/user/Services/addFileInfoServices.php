<?php
include "../DB/DBhelper.php";
$DB = new DBhelper();
session_start();
if ($_POST) {
    $name = $_SESSION['username'];
    $id=$_SESSION['id'];
    $date=date('Y-m-d H:i:s');
    $file = $_FILES['file'];
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size']/1024;
    $file_type=$file['type'];
    $file_status=1;
    $file_path_id="../File/".$id;
    if (!file_exists($file_path_id)){
        mkdir($file_path_id);
    }
        $file_path = $file_path_id . "/" . $file_name;
        if (file_exists($file_path)) {
            echo "<script>alert('已有该文件');history.back();</script>";
        } else {
            if (move_uploaded_file($file_tmp, $file_path)) {
                //查询最大id
                $sql_id = "select * from fileInfo group by id desc limit 0,1  ";
                $arr = $DB->queryData($sql_id);
                $arr_id = $arr[0]['id'] + 1;
                $sql_userId = "select * from userInfo where username='" . $name . "' ";
                $arr_name = $DB->queryData($sql_userId);
                $userId = $arr_name[0]['id'];
                $sql_insert = "insert into fileInfo values(?,?,?,?,?,?,?,?)";
                $con = $DB->add_delete_insert($sql_insert);
                $stmt = $con->prepare($sql_insert);
                $stmt->bind_param("iississi", $arr_id, $userId, $file_path, $file_name, $file_size, $file_type, $date, $file_status);
                $count = $stmt->execute();
                if ($count > 0) {
                    echo "<script>alert('文件上传成功');window.location.href='../page/fileInfo.php';</script>";
                } else {
                    echo "<script>alert('文件上传失败!!!!');history.back();</script>";
                }
            }
        }
}