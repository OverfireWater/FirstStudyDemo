<?php
include "../DB/DBhelper.php";
$DB=new DBhelper();
$sql = "select employee.* ,departinfo.departName as departName from employee,departinfo where employee.departId=departinfo.departId";
$arr = $DB->queryData($sql);
$arr_emp = "";
if (count($arr) > 0) {
    for ($i = 0; $i < count($arr); $i++) {
        $arr_obj = $arr[$i];
        if ($i == count($arr) - 1) {
            $arr_emp .= json_encode($arr_obj);
        } else {
            $arr_emp .= json_encode($arr_obj) . ",";
        }
    }
    echo "{\"result\":[$arr_emp]}";
}