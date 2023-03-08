<?php
include "../DB/DBhelper.php";
$db=new DBhelper();
if ($_POST){
    $username = $_POST['username'];
    $userpwd = $_POST['userpwd'];
    $renpwd=$_POST['renpwd'];
    $phone=$_POST['phone'];
    $datetime=date("Y-m-d H:i:s");
    $status=1;
//    查询用户名是否有重复的
    $arr_select=$db->queryData("select * from userInfo where username='".$username."'");
    if (!empty($arr_select)){
        echo "name_repeat";
    }else{
        //    添加信息
        $sql_id = "select * from userInfo group by id desc limit 0,1  ";
        $arr = $db->queryData($sql_id);
        $arr_id = $arr[0]['id'] + 1;
        $active="../../avatar/".$arr_id;
        mkdir($active);
        $active="../../avatar/".$arr_id."/pic.png";
        $flag=move_uploaded_file("../../avatar/pic.png",$active);
        if ($flag){
            $sql="insert into userinfo (username,userpwd,userphone,userImg,status,datetime) values(?,?,?,?,?,?)";
            $con=$db->add_delete_insert($sql);
            $stmt=$con->prepare($sql);
            $stmt->bind_param("ssssis",$username,$userpwd,$phone,$active,$status,$datetime);
            $stmt->execute();
            if($stmt){
                echo "success";
            }else{
                echo "error";
            }
        }
    }

}