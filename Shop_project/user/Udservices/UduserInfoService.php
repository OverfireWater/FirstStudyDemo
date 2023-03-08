<?php
session_start();
include "../DB/DBhelper.php";
$db=new DBhelper();
if ($_POST){
    $userId=$_SESSION['userId'];
    $name=$_POST['username'];
    $pwd=$_POST['userpwd'];
    $file=$_FILES['file'];
    $phone=$_POST['phone'];
    $datetime=date("Y-m-d H:i:s");
    $file_name=$file['name'];
    $tmp_path=$file['tmp_name'];
    $file_type=$file['type'];
    if ($file_type=="image/jpeg" || $file_type=="image/png"){
        $file_path="../../avatar/".$userId."/".$file_name;
        if (move_uploaded_file($tmp_path,$file_path)){
            if ($pwd=="" || $pwd==null){
                $userImg=$db->queryData("select * from userInfo where id=".$userId);
                $userImg=$userImg[0]['userImg'];
                unlink($userImg);
                $ud_sql="UPDATE userInfo set username=?, userphone=?, userImg=?, datetime=? WHERE id=?";
                $con=$db->add_delete_insert($ud_sql);
                $stmt=$con->prepare($ud_sql);
                $stmt->bind_param("ssssi",$name,$phone,$file_path,$datetime,$userId);
                $flag=$stmt->execute();
                if ($flag){
                    echo "success";
                }else{
                    echo "error";
                }
            }else{
                $ud_sql="UPDATE userInfo set username=?,userpwd=?userphone=?, userImg=?, datetime=? WHERE id=?";
                $con=$db->add_delete_insert($ud_sql);
                $stmt=$con->prepare($ud_sql);
                $stmt->bind_param("ssssssi",$name,$pwd,$phone,$file_path,$datetime,$userId);
                $flag=$stmt->execute();
                if ($flag){
                    echo "success";
                }else{
                    echo "error";
                }
            }
        }
    }
}