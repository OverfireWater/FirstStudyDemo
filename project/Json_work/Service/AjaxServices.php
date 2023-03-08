<?php

include "../DB/DBHelper.php";
if ($_GET['book_name']) {
    $book_name = $_GET['book_name'];
    $DB = new DBhelper();
    $sql = "select * from bookinfo ";
    $arr = $DB->arr_to_obj($sql);
    $json_book = "";
    for ($i = 0; $i < count($arr); $i++) {
        $bk = $arr[$i];
        if ($i == count($arr) - 1) {
            $json_book .= json_encode($bk);
        } else {
            $json_book .= json_encode($bk) . ",";
        }
    }
    echo "{\"result\":[$json_book]}";
}