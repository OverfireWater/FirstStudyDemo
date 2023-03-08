<?php
include "../DB/DBhelper.php";
if($_GET['id']){
    $id=$_GET['id'];
    $db=new DBhelper();
    $arr=$db->Query(" select * from area_Servies where pid in  (select id from area_Servies where id='".$id."') ");
    $str="";

    for ($i=0;$i<count($arr);$i++){
        $str=$str.$arr[$i]['id'].":".$arr[$i]['name'].'-';
    }
    echo $str;
}

