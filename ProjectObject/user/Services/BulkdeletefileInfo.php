<?php
include "../DB/DBhelper.php";
if ($_POST['file_id']!=""){
    $file_Id=$_POST['file_id'];
    $arr=implode(",",$file_Id);
    $DB=new DBhelper();
    $sql_select="select * from fileInfo where id in({$arr})";
    $arr_file_name=$DB->queryData($sql_select);
    for ($i=0;$i<count($arr_file_name);$i++){
        $arr_name=$arr_file_name[$i]['filename'];
        unlink("$arr_name");
    }
    $sql_delete="delete from fileInfo where id in({$arr})";
    $flag=$DB->add_delete_insert($sql_delete);
    if ($flag){
        echo "<script>alert('删除成功！');window.location.href='../page/fileInfo.php'</script>";
    }else{
        echo "<script>alert('删除失败!');history.back();</script>";
    }
}
else{
    echo "<script>alert('没有选中数据!!!');history.back()</script>";
}