<?php
$up_file=$_FILES['file'];
var_dump($up_file);
//if ($up_file['error']){
//    echo "文件上传失败";
//}
//else{
//    $file_tmp=$up_file['tmp_name'];
//    $date=date("Y")."-".date("m")."-".date("d")."-".date("H")."-".date("i")."-".date("s");
//    if ($up_file['type']=="image/jpeg"){
//        $file_path="../File/".$date.".jpg";
//    }else if ($up_file['type']=="image/png"){
//        $file_path="../File/".$date.".png";
//    }
//    if (file_exists($file_path)){
//        echo "上传失败，已有该文件";
//    }else{
//        if (move_uploaded_file($file_tmp,$file_path)){
            //添加水印
            //获取图片路径
//            $info=getimagesize($file_path);
//            $type=image_type_to_extension($info[2],false);
//            $image_c="imagecreatefrom{$type}";
//            $image=$image_c($file_path);
//            //创建图片水印颜色
//            $color=imagecolorallocatealpha($image,45,45,45,0);
//            //水印文字
//            $text="Kuang-you";
//            $font="E:\\ALGER.TTF";
//            imagettftext($image,60,300,$info[0]/4,$info[1]/4,$color,$font,$text);
//
//            imagejpeg($image,$file_path);
//            imagedestroy($image);
//
//            $image1=$image_c($file_path);
//            $sl_img=imagecreatetruecolor($info[0]/4,$info[1]/4);
//            imagecopyresized($sl_img,$image1,0,0,0,0,$info[0]/4,$info[1]/4,$info[0],$info[1]);
//            imagejpeg($sl_img,$file_path);
//            echo "<img src='$file_path'>";
//        }
//    }
//}



