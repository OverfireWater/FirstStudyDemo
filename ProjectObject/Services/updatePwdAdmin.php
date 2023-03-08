<?php
include "../DB/DBhelper.php";
$DB=new DBhelper();
session_start();
if ($_POST){
    $username=$_SESSION['adminname'];
    //获取原密码
    $mpwd=$_POST['mpass'];
    $newpass=$_POST['newpass'];
    $renewpass=$_POST['renewpass'];
    $arr=$DB->queryData("select * from adminInfo where username='".$username."'");
    if (count($arr)>0){
        $pwd=$arr[0]['userpwd'];
    }
    if ($mpwd==$pwd){
        if ($newpass==$renewpass){
            $sql=" update admininfo set userpwd=? where username=? ";
            $con=$DB->add_delete_insert($sql);
            $stmt=$con->prepare($sql);
            $stmt->bind_param("ss",$newpass,$username);
            $count=$stmt->execute();
            if ($count>0){
                echo "<script>alert('修改成功');window.top.location.reload();</script>";
            }
        }else{
            echo "<script>alert('两次密码输入不一致');history.back();</script>";
            return;
        }
    }else{
        echo "<script>alert('原密码错误');history.back();</script>";
        return;
    }

}