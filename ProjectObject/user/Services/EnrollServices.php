<?php
include "../DB/DBhelper.php";
$DB=new DBhelper();
if ($_POST){
    $username=$_POST['username'];
    $userpwd=$_POST['userpwd'];
    $nickname=$_POST['nickname'];
    $renpwd=$_POST['renpwd'];
    $userstatus=1;
    $date=date("Y-m-d H:i:s");
    $file_path="../avatar/111.jpeg";
    if ($username!=null || $userpwd!=null || $nickname!=null|| $renpwd!=null){
        if ($userpwd==$renpwd){
            $sql_id="select * from userInfo group by id desc limit 0,1 ";
            $arr_id=$DB->queryData($sql_id);
            $id=$arr_id[0]['id']+1;
            $sql="insert into userInfo values(?,?,?,?,?,?,?) ";
            $arr_insert=$DB->add_delete_insert($sql);
            $stmt=$arr_insert->prepare($sql);
            $stmt->bind_param("issssis",$id,$username,$userpwd,$nickname,$date,$userstatus,$file_path);
            $count=$stmt->execute();
            if ($count){
                echo "<script>alert('注册成功!');window.location.href='../page/login.php';</script>";
            }else{
                echo "<script>alert('注册失败!');history.back();</script>";
            }
        }else{
            echo "<script>alert('两次密码输入不正确！！！');history.back()</script>";
        }
    }else{
        echo "<script>alert('请输入信息！！！');history.back()</script>";
    }

}