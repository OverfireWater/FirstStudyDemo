<?php
ob_end_flush();
session_start();
header("Content-type:image/jpeg");
$img=imagecreatetruecolor(100,40);
$img_color=imagecolorallocate($img,247,247,247);
imagefill($img,0,0,$img_color);
$str="";
$arr=['a','b','c','d','e','f','g','h','j','k','m','n','p','q','r','s','t','u','v','w','x','y','z'];
for ($i=0;$i<4;$i++){
    $math=rand(0,10);
    if ($math%2==0){
        $arr_index=rand(0,22);
        $str.=$arr[$arr_index];
    }else{
        $str.=rand(0,9);
    }

}
for ($i=0;$i<2;$i++){
    $line_color=imagecolorallocate($img,rand(0,100),rand(0,100),rand(0,100));
    imageline($img,rand(4,100),rand(10,40),rand(10,100),rand(2,37),$line_color);
}
for ($i=0;$i<strlen($str);$i++){
    $text_color=imagecolorallocate($img,rand(20,200),rand(20,200),rand(20,200));
    $font=5;
    $x=($i*25)+rand(5,15);
    $y=rand(1,20);
    imagestring($img,$font,$x,$y,$str[$i],$text_color);
}
$_SESSION['admin_captcha']=$str;
imagejpeg($img);
imagedestroy($img);