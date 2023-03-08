<?php
include "../DB/DBhelper.php";
$db=new DBhelper();
if ($_GET['id']){
    $id=$_GET['id'];
    $file=$_FILES['file'];
    $file_tmp=$file['tmp_name'];
    $file_name=$file['name'];
    $file_tmp=$file['tmp_name'];
    $file_size=$file['size']/1024;
    $file_path = "../../banner/" . $file_name;
    $datetime=date('Y-m-d H:i:s');
    if (file_exists($file_path)){
        exit('repeat_file');
    }else{
        if (move_uploaded_file($file_tmp,$file_path)){
            $img=$db->queryData('select * from bannerInfo where id='.$id);
            $data_img=$img[0]['banner'];
            unlink($data_img);
            $udBanner='update bannerInfo set  banner=?, `size`=?, datatime=? WHERE id=? ';
            $con = $db->add_delete_insert($udBanner);
            $stmt = $con->prepare($udBanner);
            $stmt->bind_param("sisi", $file_path,$file_size, $datetime,$id);
            $flag=$stmt->execute();
            if ($flag){
                exit('success');
            }
        }else{
            exit('error');
        }
    }
}