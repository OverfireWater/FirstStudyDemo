<?php

$up_file=$_FILES['file'];

if ($up_file['error']>0){
    echo "文件上传失败";
}
else{
//    echo "文件上传名称".$up_file['name']."<br>";
//    echo "文件上传类型".$up_file['type']."<br>";
//    echo "文件上传位置".$up_file['tmp_name']."<br>";
//    echo "文件上传大小".$up_file['size']."<br>";
    $file_path="../File/".$up_file['name'];
    $file_tmp=$up_file['tmp_name'];
    if ($up_file['type']=="image/jpeg" ){
        if(file_exists($file_path)){
            echo "上传失败";
        }else{
            if (move_uploaded_file($file_tmp,$file_path)){
                echo "上传成功";
                echo "<img width=500px height=500px src='../File/".$up_file['name']."'/>";
            }else{
                echo "上传失败";
            }
        }
    }else{
        echo "文件大小类型超过能承载的内存";
    }
}



