<?php
include "../DB/DBhelper.php";
if ($_POST) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $depart_index = $_POST['depart'];
    $address = $_POST['address'];
    $telphone = $_POST['telphone'];
    $xueli = $_POST['xueli'];
    $remark = $_POST['remark'];
    $file=$_FILES['file'];
    $date=date("Y")."-".date("m")."-".date("d")."-".date("H")."-".date("i")."-".date("s");
    if ($file['type']=="image/jpeg"){
        $file_path="../File/".$date.".jpg";
    }else if ($file['type']=="image/png"){
        $file_path="../File/".$date.".png";
    }
    emp_files($file);
    if ($name == null || $age == null || $depart_index =="0" || $address ==null || $telphone==null || $xueli=="0" || $file==null) {
        echo "<script>alert('Data cannot be empty');window.location.href='../page/addEmploy.html'</script>";
    }
    else{
        $DB = new DBhelper();
        $sql = "select * from employee group by employeeId desc limit 0,1  ";
        $arr = $DB->queryData($sql);
        $arr_id = $arr[0]['employeeId'] + 1;
        $sql_insert = "insert into employee values(?,?,?,?,?,?,?,?,?,?)";
        $con = $DB->add_delete_insert($sql_insert);
        $stmt=$con->prepare($sql_insert);
        $stmt->bind_param("isissssssi", $arr_id, $name, $age, $sex, $telphone, $address, $xueli, $remark,$file_path,$depart_index);
        $count = $stmt->execute();
        if ($count>0){
            echo "<script>alert('success');window.location.href='../page/addEmploy.html'</script>";
        }else{
            echo "<script>alert('error');window.location.href='../page/addEmploy.html'</script>";
        }
    }
}

function emp_files($file){

    $file_tmp=$file['tmp_name'];
    $date=date("Y")."-".date("m")."-".date("d")."-".date("H")."-".date("i")."-".date("s");
    if ($file['type']=="image/jpeg"){
        $file_path="../File/".$date.".jpg";
    }else if ($file['type']=="image/png"){
        $file_path="../File/".$date.".png";
    }
    if (file_exists($file_path)){
        echo "上传失败，已有该文件";
    }else{
        if (move_uploaded_file($file_tmp,$file_path)){
            echo "<script>alert('上传成功')</script>";
        }
    }
}


