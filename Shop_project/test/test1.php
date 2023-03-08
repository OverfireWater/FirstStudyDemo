<?php
$file=$_FILES['file'];
$file_tmp=$file['tmp_name'];
$flag=move_uploaded_file($file_tmp,"file/".$file['name']);
    if ($flag){
        exit(json_encode(array("code"=>0,"msg"=>"ok")));
    }else{
        exit(json_encode(array("code"=>1,"msg"=>"false",0)));
    }
