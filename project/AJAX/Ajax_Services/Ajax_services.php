<?php
if($_GET['name']){
    $arr=["bluce","jack","admin"];
    $name=$_GET['name'];
    $statue="r";
    for ($i=0;$i<count($arr);$i++){
        if($arr[$i]==$name){
            $statue="w";
            break;
        }
    }
    echo $statue;
}
