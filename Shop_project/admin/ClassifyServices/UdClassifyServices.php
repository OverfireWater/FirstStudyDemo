<?php
include "../DB/DBhelper.php";
$db = new DBhelper();
if ($_POST) {
    $id = $_POST['id'];
    $classify_name = $_POST['classify_name'];
    $Parent_classify = $_POST['Parent_classify'];
    $remark = $_POST['remark'];
    $ud_sql = "update shopclassify SET classifyName=?, parent=?, remark=? WHERE id=?";
    $con = $db->add_delete_insert($ud_sql);
    $stmt = $con->prepare($ud_sql);
    $stmt->bind_param("sisi", $classify_name, $Parent_classify, $remark, $id);
    $flag = $stmt->execute();
    if ($flag) {
        echo "success";
    } else {
        echo "error";
    }
}