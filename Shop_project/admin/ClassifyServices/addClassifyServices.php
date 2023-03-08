<?php
include "../DB/DBhelper.php";
$db=new DBhelper();
if ($_POST){
    $classify_name=$_POST['classify_child_name'];
    $Parent_classify=$_POST['Parent_classify'];
    $remark=$_POST['remark'];
    $status=0;
    $repeat=$db->queryData("select * from shopClassify where classifyName='".$classify_name."' ");
    if (!empty($repeat)){
        echo "repeat";
    }else{
        $sql_insert="insert into shopClassify ( `classifyName`, `parent` ,`remark`, `status`) values (?,?,?,?)";
        $con=$db->add_delete_insert($sql_insert);
        $stmt=$con->prepare($sql_insert);
        $stmt->bind_param("sisi",$classify_name,$Parent_classify,$remark,$status);
        $flag=$stmt->execute();
        if ($flag){
            echo "success";
        }else{
            echo "error";
        }
    }
}