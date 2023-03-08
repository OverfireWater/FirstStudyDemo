<?php
//include "../Entily/AdminInfo.php";
//include "../Entily/userInfo.php";
include "../Entily/fileInfo.php";
class DBhelper
{
    //连接数据库
    function getCon()
    {
        $con = new mysqli("localhost", "root", "root", "mangerfiledb");
        if ($con->error) {
            echo "连接失败,请检查地址是否正确" . $con->error;
        }
        return $con;
    }

    //增删改
    function add_delete_insert($sql)
    {
        $con = $this->getCon();
        $con->multi_query($sql);
        return $con;
    }

    //查询结果
    function queryData($sql)
    {
        $con = $this->getCon();
        $result = $con->query($sql);
        $arr_obj = null;
        $i = 0;
        if ($result->num_rows > 0) {
            while ($arr = $result->fetch_assoc()) {
                $arr_obj[$i] = $arr;
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

    //employee的实例
    function admininfo_to_obj($sql)
    {
        $arr = $this->query_date($sql);
        $arr_obj = null;
        for ($i = 0; $i < count($arr); $i++) {
            $admin = new AdminInfo();
            $admin->setId($arr[$i][0]);
            $admin->setUsername($arr[$i][1]);
            $admin->setUserpwd($arr[$i][2]);
            $admin->setTelphone($arr[$i][3]);
            $admin->setDate($arr[$i][4]);
            $admin->setIssuper($arr[$i][5]);
            $admin->setUserstatus($arr[$i][6]);
            $arr_obj[$i] = $admin;
        }
        return $arr_obj;
    }
    //userInfo的实例
    function userInfo_to_obj($sql)
    {
        $arr = $this->query_date($sql);
        $arr_obj = null;
        for ($i = 0; $i < count($arr); $i++) {
            $admin = new userInfo();
            $admin->setId($arr[$i][0]);
            $admin->setUsername($arr[$i][1]);
            $admin->setUserpwd($arr[$i][2]);
            $admin->setNickname($arr[$i][3]);
            $admin->setRegtime($arr[$i][4]);
            $admin->setUserstatus($arr[$i][5]);
            $arr_obj[$i] = $admin;
        }
        return $arr_obj;
    }
    //fileInfo的实例
    function fileInfo_to_obj($sql)
    {
        $arr = $this->query_date($sql);
        $arr_obj = null;
        for ($i = 0; $i < count($arr); $i++) {
            $file = new fileInfo();
            $file->setId($arr[$i][0]);
            $file->setUid($arr[$i][1]);
            $file->setFilename($arr[$i][2]);
            $file->setTruename($arr[$i][3]);
            $file->setFilesize($arr[$i][4]);
            $file->setFiletype($arr[$i][5]);
            $file->setAddtime($arr[$i][6]);
            $file->setFilestatus($arr[$i][7]);
            $file->setNickname($arr[$i][8]);
            $arr_obj[$i] = $file;
        }
        return $arr_obj;
    }
    //fileInfo的实例
    function fileInfo_username_to_obj($sql)
    {
        $arr = $this->query_date($sql);
        $arr_obj = null;
        for ($i = 0; $i < count($arr); $i++) {
            $file = new fileInfo();
            $file->setId($arr[$i][0]);
            $file->setUid($arr[$i][1]);
            $file->setFilename($arr[$i][2]);
            $file->setTruename($arr[$i][3]);
            $file->setFilesize($arr[$i][4]);
            $file->setFiletype($arr[$i][5]);
            $file->setAddtime($arr[$i][6]);
            $file->setFilestatus($arr[$i][7]);
            $file->setNickname($arr[$i][8]);
            $arr_obj[$i] = $file;
        }
        return $arr_obj;
    }
}
//$DB = new DBhelper();
//$sql = " select * from  UserInfo where userName='admin' and userPwd='123456' ";
//$arr = $DB->queryData($sql);
//$userId=$arr[0]['userId'];
//var_dump($userId);