<?php
include "../Entily/shopInfo.php";
include "../Entily/bannerInfo.php";
include "../Entily/classify.php";
include "../Entily/Parent_classify.php";
include "../Entily/userInfo.php";
class DBhelper
{
    //连接数据库
    function getCon()
    {
        $con = new mysqli("localhost", "root", "root", "shopdb");
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

//    shopInfo的实例
    function shopInfo_to_obj($sql)
    {
        $arr = $this->query_date($sql);
        $arr_obj = null;
        for ($i = 0; $i < count($arr); $i++) {
            $admin = new shopInfo();
            $admin->setId($arr[$i][0]);
            $admin->setClassifyId($arr[$i][1]);
            $admin->setName($arr[$i][2]);
            $admin->setVpi($arr[$i][3]);
            $admin->setRecommend($arr[$i][4]);
            $admin->setStatus($arr[$i][5]);
            $admin->setDatetime($arr[$i][6]);
            $admin->setRemark($arr[$i][7]);
            $admin->setClassifyName($arr[$i][8]);
            $arr_obj[$i] = $admin;
        }
        return $arr_obj;
    }

    //bannerInfo的实例
    function bannerInfo_to_obj($sql)
    {
        $arr = $this->query_date($sql);
        $arr_obj = null;
        for ($i = 0; $i < count($arr); $i++) {
            $admin = new bannerInfo();
            $admin->setId($arr[$i][0]);
            $admin->setBanner($arr[$i][1]);
            $admin->setSize($arr[$i][2]);
            $admin->setDatetime($arr[$i][3]);
            $admin->setStatus($arr[$i][4]);
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
            $admin->setUserId($arr[$i][0]);
            $admin->setUsername($arr[$i][1]);
            $admin->setPhone($arr[$i][3]);
            $admin->setImg($arr[$i][4]);
            $admin->setStatus($arr[$i][5]);
            $admin->setDatetime($arr[$i][6]);
            $arr_obj[$i] = $admin;
        }
        return $arr_obj;
    }
    //fileInfo的实例
    function ClassifyInfo_to_obj($sql)
    {
        $arr = $this->query_date($sql);
        $arr_obj = null;
        for ($i = 0; $i < count($arr); $i++) {
            $file = new classify();
            $file->setId($arr[$i][0]);
            $file->setClassify($arr[$i][1]);
            $file->setParentId($arr[$i][2]);
            $file->setRemark($arr[$i][3]);
            $file->setStatus($arr[$i][4]);
            $file->setParentName($arr[$i][5]);
            $arr_obj[$i] = $file;
        }
        return $arr_obj;
    }
    //fileInfo的实例
    function Parent_classify_to_obj($sql)
    {
        $arr = $this->query_date($sql);
        $arr_obj = null;
        for ($i = 0; $i < count($arr); $i++) {
            $file = new Parent_classify();
            $file->setId($arr[$i][0]);
            $file->setParentClassifyName($arr[$i][1]);
            $file->setRemark($arr[$i][2]);
            $file->setDatetime($arr[$i][3]);
            $arr_obj[$i] = $file;
        }
        return $arr_obj;
    }
}
//$DB = new DBhelper();
//$sql = " select * from  shopInfo where id=2";
//$arr = $DB->shopInfo_to_obj($sql);
//$a=$arr[0]->getName();
//echo $a;