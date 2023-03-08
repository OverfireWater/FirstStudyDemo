<?php
$src="image/pic.jpg";
$info=getimagesize($src);
$type=image_type_to_extension($info[2],false);
$img_c="imagecreatefrom{$type}";
$image=$img_c($src);
//创建图片对象
//if ($info['mime']=="image/jpeg"){
//    $image=imagecreatefromjpeg($src);
//}else if($info['mime']=="image/png"){
//    $image=imagecreatefrompng($src);
//}

//创建图片颜色
$color=imagecolorallocatealpha($image,0,0,0,0);
//水印字体
$content="Kuangzhongyou";
//文字路径
$font="E:\\ALGER.TTF";
//加水印
imagettftext($image,120,0,$info[0]/4,$info[1]/2,$color,$font,$content);
imagejpeg($image,"image/pic.jpg");
imagedestroy($image);

//缩略图
$image1=imagecreatefromjpeg($src);
$sl_img=imagecreatetruecolor(300,300);
imagecopyresized($sl_img,$image1,0,0,0,0,300,300,$info[0],$info[1]);
imagejpeg($sl_img,"3.jpg");