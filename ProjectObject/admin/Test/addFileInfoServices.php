<?php
include "../DB/DBhelper.php";
$DB = new DBhelper();
if ($_POST) {
    $name = $_POST['name'];
    $date=$_POST['date'];
    $file = $_FILES['file'];
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size']/1024;
    $file_type=$file['type'];
    $file_status=1;
    if ($file['type'] == "image/jpeg") {
        $file_path = "../File/" . $file_name;
    } else if ($file['type'] == "image/png") {
        $file_path = "../File/" . $file_name;
    } else if ($file['type'] == "application/octet-stream") {
        $file_path = "../File/" . $file_name;
    } else if ($file['type'] == "application/x-zip-compressed") {
        $file_path = "../File/" . $file_name;
    }else{
        echo "文件类型不支持";
        return;
    }
    if (file_exists($file_path)) {
        echo "<script>alert('已有该文件');history.back();</script>";
    } else {
        if (move_uploaded_file($file_tmp,$file_path)) {
            //查询最大id
            $sql_id = "select * from adminfileInfo group by id desc limit 0,1  ";
            $arr = $DB->queryData($sql_id);
            $arr_id = $arr[0]['id'] + 1;
            $sql_userId="select * from adminInfo where username='".$name."' ";
            $arr_name=$DB->queryData($sql_userId);
            $userId=$arr_name[0]['id'];
            $sql_insert="insert into adminfileInfo values(?,?,?,?,?,?,?,?)";
            $con=$DB->add_delete_insert($sql_insert);
            $stmt=$con->prepare($sql_insert);
            $stmt->bind_param("iississi",$arr_id,$userId,$file_path,$file_name,$file_size,$file_type,$date,$file_status);
            $count=$stmt->execute();
            if ($count>0){
                echo "<script>alert('success');window.location.href='adminfileInfo.php';</script>";
            }else{
                echo "<script>alert('error');history.back();</script>";
            }
        }
    }
}