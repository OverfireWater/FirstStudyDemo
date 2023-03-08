<?php
include "../Entily/departInfo.php";
include "../Entily/empInfo.php";
class DBhelper{
    //连接数据库
    function getCon(){
        $con=new mysqli("localhost","root","root","mangerDB");
        if ($con->error){
            echo "连接失败,请检查地址是否正确".$con->error;
        }
        return $con;
    }
    //增删改
    function add_delete_insert($sql){
        $con=$this->getCon();
        $con->multi_query($sql);
        return $con;
    }
    //查询结果
    function queryData($sql){
        $con=$this->getCon();
        $result=$con->query($sql);
        $arr_obj=null;
        $i=0;
        if ($result->num_rows>0){
            while ($arr=$result->fetch_assoc()){
               $arr_obj[$i]=$arr;
               $i++;
            }
        }
        return $arr_obj;
    }
    function query_date($sql)
    {
        $con = $this->getCon();

        $result = $con->query($sql);
        $arr = $result->fetch_all(MYSQLI_NUM);
        return $arr;
    }
    //departInfo的实例
    function depart_to_obj($sql)
    {
        $arr = $this->query_date($sql);
        $arr_obj = null;
        for ($i = 0; $i < count($arr); $i++) {
            $depart = new departInfo();
            $depart->setDepartId($arr[$i][0]);
            $depart->setDepartName($arr[$i][1]);
            $depart->setDepartMark($arr[$i][2]);
            $arr_obj[$i] = $depart;
        }
        return $arr_obj;
    }
    //employee的实例
    function employee_to_obj($sql)
    {
        $arr = $this->query_date($sql);
        $arr_obj = null;
        for ($i = 0; $i < count($arr); $i++) {
            $employee = new empInfo();
            $employee->setEmployeeId($arr[$i][0]);
            $employee->setName($arr[$i][1]);
            $employee->setAge($arr[$i][2]);
            $employee->setSex($arr[$i][3]);
            $employee->setTelphone($arr[$i][4]);
            $employee->setAddress($arr[$i][5]);
            $employee->setXueli($arr[$i][6]);
            $employee->setMark($arr[$i][7]);
            $employee->setEmpImg($arr[$i][8]);
            $employee->setDepartId($arr[$i][9]);
            $employee->setDepartName($arr[$i][10]);
            $arr_obj[$i] = $employee;
        }
        return $arr_obj;
    }
}
//$DB = new DBhelper();
//$sql = " select * from  UserInfo where userName='admin' and userPwd='123456' ";
//$arr = $DB->queryData($sql);
//$userId=$arr[0]['userId'];
//var_dump($userId);