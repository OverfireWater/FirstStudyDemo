<?php
ob_end_flush();
session_start();

header("Content-type:image/png");
$img=imagecreatetruecolor(100,30);
$str="";
$arr=['a','b','c','d','e','f','g','h','j','k','m','n','p','q','r','s','t','u','v','w','x','y','z'];

for ($i=0;$i<4;$i++){
    $math=mt_rand(0,10);
    if($math%2==0){
        $arr_index=mt_rand(0,22);
        $arr_eng=$arr[$arr_index];
        if ($math%3==0){
            $arr_eng=strtoupper($arr[$arr_index]);
        }
        $str=$str.$arr_eng;
    }else{
        $str=$str.mt_rand(0,9);
    }
}


for ($i=0; $i<strlen($str); $i++){
    $text_color=imagecolorallocate($img,mt_rand(150,255),mt_rand(80,255),mt_rand(150,255));
//    $str="abcdefghijklmnopqrstuvwxyz0123456789";
//    $str1=substr($str,rand(0,strlen($str)),1);
//    $cath.=$str1;
    $font=mt_rand(5,10);
    $x=($i*100/4)+rand(5,10);
    $y=mt_rand(0,15);
    imagestring($img,$font,$x,$y,$str[$i],$text_color);

}
$_SESSION['auth']=$str;
imagepng($img);
imagedestroy($img);