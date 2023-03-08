<?php
include "../DB/DBhelper.php";
$db = new DBhelper();

$file = $_FILES['file'];
$file_name = $file['name'];
$file_tmp = $file['tmp_name'];
$img_id = $_POST['id'];
$datetime = date('Y-m-d H:i:s');
$path = "../../File/" . $img_id . "/3";
$file_path = $path . "/" . $file_name;
if (!file_exists($path)){
    mkdir($path);
}
if (move_uploaded_file($file_tmp, $file_path)) {
    $sql = "insert into shopintroductioninfo (`shopId`, `Shopimg`, `datetime`) values(?,?,?)";
    $con = $db->add_delete_insert($sql);
    $stmt = $con->prepare($sql);
    $stmt->bind_param("iss", $img_id, $file_path, $datetime);
    $flag = $stmt->execute();
    if ($flag) {
        exit(json_encode(array("code" => 0, "msg" => "ok", "size" => $file['size']), 0));
    } else {
        exit(json_encode(array("code" => 1, "msg" => "false", "size" => $file['size']), 0));
    }
}