<?php
include "../DB/DBhelper.php";
$DB=new DBhelper();
if ($_GET){
    $fileid=$_GET['id'];
    $sql="select * from fileInfo where id=".$fileid;
    $file_arr=$DB->queryData($sql);
    $truename=$file_arr[0]['truename'];
    $truename=urlencode($truename);
    $file_path=$file_arr[0]['filename'];
    $filetype=filetype($file_path);
    header("Content-type: $filetype");
    header("Content-Disposition: attachment;filename=".$truename);
    header("Content-Transfer-Encoding: binary");
    header('Pragma: no-cache');
    header('Expires: 0');
    readfile($file_path);
}