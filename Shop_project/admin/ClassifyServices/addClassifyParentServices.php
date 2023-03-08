<?php
include "../DB/DBhelper.php";
$db=new DBhelper();
if ($_POST){
    $classify_name=$_POST['classify_name'];
    $remark=$_POST['remark'];
    $datetime=date('Y-m-d H:i:s');
    $repeat=$db->queryData("select * from shopClassify_const where classifyParentName='".$classify_name."' ");
    if (!empty($repeat)){
        echo "repeat";
    }else{
        $sql_insert="insert into shopClassify_const ( `classifyParentName`, `remark`, `datetime`) values (?,?,?)";
        $con=$db->add_delete_insert($sql_insert);
        $stmt=$con->prepare($sql_insert);
        $stmt->bind_param("sss",$classify_name,$remark,$datetime);
        $flag=$stmt->execute();
        if ($flag){
            echo "success";
        }else{
            echo "error";
        }
    }
}