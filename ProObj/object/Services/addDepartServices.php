<?php
include "../DB/DBhelper.php";
if ($_POST){
    $name=$_POST['name'];
    $remark=$_POST['remark'];
    $DB = new DBhelper();
    $sql = "select * from departInfo group by departId desc limit 0,1  ";
    $arr = $DB->queryData($sql);
    if ($arr>0){
        $arr_id = $arr[0]['departId'] + 1;
    }
    if ($name!=""){
        $sql_insert="insert into departInfo values(?,?,?)";
        $con=$DB->add_delete_insert($sql_insert);
        $stmt=$con->prepare($sql_insert);
        $stmt->bind_param("iss",$arr_id,$name,$remark);
        $count=$stmt->execute();
        if ($count>0){
            echo "<script>alert('The Data is Added successfully');window.location.href='../page/addDepart.html'</script>";
        }else{
            echo "<script>alert('Data error');window.location.href='../page/addDepart.html'</script>";
        }
    }else{
        echo "<script>alert('Cannot be empty');window.location.href='../page/addDepart.html'</script>";
    }

}