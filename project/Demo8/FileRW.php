<?php
$path="E:\\Demo9";
if(file_exists($path)){
    echo "目录已经存在";
}else{
    mkdir($path);
    echo "目录已经创建好了";
}
$file_path=$path."\\test1.txt";
if (file_exists($file_path)){
    echo "文件已经存在";
}else{
    $f=fopen($file_path,"w");
    fclose($f);
    echo "文件已经创建好了";
}

$path="E:\\9-14";
$f=fopen($path,'r');
$fn=fread($f,filesize($path));
fclose($f);

$new_file="E:\\FileRW\\9-14";
$fopen=fopen($new_file,'w');
fwrite($fopen,$fn);
fclose($fopen);
