<?php
include "../DB/DBhelper.php";
$DB = new DBhelper();
if ($_POST) {
    $shopId_arr = $_POST['id'];
    for ($i = 0; $i < count($shopId_arr); $i++) {
        $shopId = $shopId_arr[$i];
        $sql_delete = "delete from shopInfo where id =?";
        $con = $DB->add_delete_insert($sql_delete);
        $stmt=$con->prepare($sql_delete);
        $stmt->bind_param('i',$shopId);
        $flag=$stmt->execute();
    }
    if ($flag) {
        echo "success";
    } else {
        echo "error";
    }
}