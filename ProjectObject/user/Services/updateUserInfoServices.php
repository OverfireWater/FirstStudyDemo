<?php
include "../DB/DBhelper.php";
session_start();
$DB=new DBhelper();
if ($_POST['nickname']){
    $nickname=$_POST['nickname'];
    $id=$_SESSION['id'];
    $file=$_FILES['file'];
    $file_name = $file['name'];
    $file_tpye=$file['type'];
    $file_tmp=$file['tmp_name'];
    $file_avatar="../avatar/".$id;
    if ($file_name==null){
        $sql_update="update userInfo set nickname=? where id=?";
        $con=$DB->add_delete_insert($sql_update);
        $stmt=$con->prepare($sql_update);
        $stmt->bind_param("si",$nickname,$id);
        $count=$stmt->execute();
        if ($count){
            echo "<script>alert('修改成功');window.location.href='../page/updateUserInfo.php';</script>";
        }else{
            echo "<script>alert('修改成功');history.back();</script>";
        }
    }
    else if (file_exists($file_avatar)==false){
        mkdir($file_avatar);
    }
    if ($file_tpye=="image/jpeg" || $file_tpye=="image/png"){
        $file_path=$file_avatar."/".$file_name;
    }
    if (move_uploaded_file($file_tmp,$file_path)){

            $sql_update="update userInfo set nickname=?,userpic=?  where id=?";
            $con=$DB->add_delete_insert($sql_update);
            $stmt=$con->prepare($sql_update);
            $stmt->bind_param("ssi",$nickname,$file_path,$id);
            $count=$stmt->execute();
            if ($count){
                echo "<script>alert('修改成功');window.location.href='../page/updateUserInfo.php';</script>";
            }else{
                echo "<script>alert('修改成功');history.back();</script>";
            }

    }
}