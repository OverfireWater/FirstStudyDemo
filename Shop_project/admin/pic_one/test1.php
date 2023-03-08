<?php
//$file=$_FILES['file'];
//$file_tmp=$file['tmp_name'];
//$flag=move_uploaded_file($file_tmp,"../file/".$file['name']);
//    if ($flag){
//        exit(json_encode(array("code"=>0,"msg"=>"ok")));
//    }else{
//        exit(json_encode(array("code"=>1,"msg"=>"false",0)));
//    }
//include "../DB/DBhelper.php";
//$db=new DBhelper();
//$img_id=1;
$file=$_FILES['file'];
$file_tmp=$file['tmp_name'];
//$datetime = date('Y-m-d H:i:s');
$file_path="file/".$file['name'];
$flag=move_uploaded_file($file_tmp,$file_path);
//$sql_id = "select * from shopimgInfo group by id desc limit 0,1  ";
//$arr = $db->queryData($sql_id);
//$arr_id = $arr[0]['id'] + 1;
//$sql = "insert into shopImgInfo values(?,?,?,?)";
//$con = $db->add_delete_insert($sql);
//$stmt = $con->prepare($sql);
//$stmt->bind_param("iiss", $arr_id, $img_id, $file_path, $datetime);
//$flag = $stmt->execute();
//echo $arr_id.$img_id.$file_path.$datetime;
if ($flag) {
    exit(json_encode(array("code" => 0, "msg" => "ok")));
}