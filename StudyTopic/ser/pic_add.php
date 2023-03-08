<?php
include "../DB/DBhelper.php";
$db=new DBhelper();
if ($_POST){
    $topic=$_POST['topic'];
    $ans1=$_POST['ans1'];
    $ans2=$_POST['ans2'];
    $ans3=$_POST['ans3'];
    $ans4=$_POST['ans4'];
    $sql="INSERT INTO studypic ( `topic`, `ans`, `ans2`, `ans3`, `ans4`) VALUES ( ?, ?, ?, ?, ?)";
    $con=$db->add_delete_insert($sql);
    $stmt=$con->prepare($sql);
    $stmt->bind_param('sssss',$topic,$ans1,$ans2,$ans3,$ans4);
    $flag=$stmt->execute();
    if ($flag){
        echo "success";
    }else{
        echo "error";
    }
}