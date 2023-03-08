<?php
include "../DB/DBhelper.php";
$db = new DBhelper();
$file = $_FILES['file'];
$file_name = $file['name'];
$file_tmp = $file['tmp_name'];
$file_size=$file['size']/1024;
$file_type = $file['type'];
$datetime=date("Y-m-d H:i:s");
$status=1;
$file_path = "../../banner/" . $file_name;
    if (!file_exists($file_path)) {
        if (move_uploaded_file($file_tmp, $file_path)) {
            $sql_insert = "insert into bannerInfo ( banner, size, datatime, status) values(?,?,?,?)";
            $con = $db->add_delete_insert($sql_insert);
            $stmt = $con->prepare($sql_insert);
            $stmt->bind_param("sssi",  $file_path,$file_size,$datetime,$status);
            $flag=$stmt->execute();
            if ($flag){
                exit(json_encode(array("code"=>0,"msg"=>"ok","file"=>$file_path,"size"=>$file['size']),0));
            }else{
                exit(json_encode(array("code"=>1,"msg"=>"false","file"=>$file,"size"=>$file['size']),0));
            }
        }
    } else {
        exit(json_encode(array("code"=>2,"msg"=>"false","file"=>$file,"size"=>$file['size']),0));
    }

