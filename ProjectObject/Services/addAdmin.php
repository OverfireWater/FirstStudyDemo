<?php
include_once "../DB/DBhelper.php";
$DB=new DBhelper();
if ($_POST){
    $name=$_POST['name'];
    $password=$_POST['password'];
    $renpassword=$_POST['renpassword'];
    $telphone=$_POST['telphone'];
    $date=$_POST['date'];
    $radio=$_POST['radio'];
    $status=0;
    $sql_name="select * from adminInfo where username='".$name."' ";
    $admin_name=$DB->queryData($sql_name);
    $username=$admin_name[0]['username'];
    if ($name!=$username){
        if ($password==$renpassword){
            $sql_select="select * from admininfo group by id desc limit 0,1 ";
            $arr_id=$DB->queryData($sql_select);
            $id=$arr_id[0]['id']+1;
            $sql_insert="insert into admininfo values(?,?,?,?,?,?,?)";
            $arr_insert=$DB->add_delete_insert($sql_insert);
            $stmt=$arr_insert->prepare($sql_insert);
            $stmt->bind_param("issssii",$id,$name,$password,$telphone,$date,$radio,$status);
            $count=$stmt->execute();
            if ($count>0){
                echo "<script>alert('Add Success');window.location.href='../admin/addAdmin.php';</script>";
            }
        }else{
            echo "<script>alert('两次密码输入不一致');history.back();</script>";
        }
    }else{
        echo "<script>alert('管理员名称已存在');history.back();</script>";
    }
}