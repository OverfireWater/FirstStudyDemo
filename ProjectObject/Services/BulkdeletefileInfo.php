<?php
include "../DB/DBhelper.php";
if ($_POST['file_id']!=""){
    $file_Id=$_POST['file_id'];
    $arr=implode(",",$file_Id);
    $DB=new DBhelper();
    $sql_select="select * from fileInfo where id in({$arr})";
    $arr_file_name=$DB->queryData($sql_select);
    for ($i=0;$i<count($arr_file_name);$i++){
        $arr_name=$arr_file_name[$i]['truename'];
        $file_uid=$arr_file_name[$i]['uid'];
       unlink("../user/File/".$file_uid."/".$arr_name);
    }
    $sql_delete="delete from fileInfo where id in({$arr})";
    $flag=$DB->add_delete_insert($sql_delete);
    if ($flag){
        echo "<script>alert('Delete Success');window.location.href='../admin/fileInfo.php'</script>";
    }else{
        echo "<script>alert('Delete Error');history.back();</script>";
    }
}
else{
    echo "<script>alert('There is no data transfer!!!');history.back()</script>";
}