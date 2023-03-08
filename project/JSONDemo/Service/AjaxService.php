<?php
include "../DB/DBHelper.php";

if($_GET['book_name']){
    $bk_name=$_GET['book_name'];
    $dbhelper=new DBHelper();
    $arr=$dbhelper->arr_to_obj("select * from bookinfo where Book_name like '%$bk_name%'");
    $json_book="";
    for($i=0;$i<count($arr);$i++){
        $bk=$arr[$i];
        if($i==count($arr)-1){
            $json_book=$json_book.json_encode($bk);
        }else{
            $json_book=$json_book.json_encode($bk).",";
        }

    }

    echo "{\"result\":[$json_book]}";
}


