<?php
include "../DB/DBhelper.php";
$db = new DBhelper();
session_start();
if ($_SESSION['shopId']) {
    $file = $_FILES['file'];
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $img_id = $_SESSION['shopId'];
    $datetime = date('Y-m-d H:i:s');
    $file_path_id = "../../File/" . $img_id;
    $file_path_dis=$file_path_id."/2";
    if (!file_exists($file_path_id)) {
        mkdir($file_path_id);
    }
    if (!file_exists($file_path_dis)) {
        mkdir($file_path_dis);
    }
    $file_path = $file_path_dis . "/" . $file_name;
    if (move_uploaded_file($file_tmp, $file_path)) {
        $sql = "insert into shopImgInfo (`shopImgID`, `img`, `datetime`) values(?,?,?)";
        $con = $db->add_delete_insert($sql);
        $stmt = $con->prepare($sql);
        $stmt->bind_param("iss", $img_id, $file_path, $datetime);
        $flag = $stmt->execute();
        if ($flag){
            exit(json_encode(array("code"=>0,"msg"=>"ok","file"=>$file_path,"size"=>$file['size']),0));
        }else{
            exit(json_encode(array("code"=>1,"msg"=>"false","file"=>$file,"size"=>$file['size']),0));
        }
    }
}else{
    exit(json_encode(array("code"=>1,"msg"=>"false",0)));
}