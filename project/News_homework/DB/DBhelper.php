<?php
include "../Entily/NewsInfo.php";

class DBhelper
{
    function getCon()
    {
            $con = new mysqli('localhost', 'root', 'root', 'news');

        if ($con->connect_errno) {
            die("连接失败" . $con->connect_error);
        }
        return $con;
    }

    //增删改
    function Mysql_date($sql)
    {
        $con = $this->getCon();
        return $con;
    }

    function query_date($sql)
    {
        $con = $this->getCon();

        $result = $con->query($sql);
        $arr = $result->fetch_all(MYSQLI_NUM);
        return $arr;
    }

    function arr_to_obj($sql)
    {
        $arr = $this->query_date($sql);
        $arr_obj = null;
        for ($i = 0; $i < count($arr); $i++) {
            $ne = new NewsInfo();
            $ne->setNewsId($arr[$i][0]);
            $ne->setNewsTitle($arr[$i][1]);
            $ne->setNewsContent($arr[$i][2]);
            $ne->setNewsDate($arr[$i][3]);
            $ne->setNewsType($arr[$i][4]);
            $arr_obj[$i] = $ne;
        }
        return $arr_obj;
    }
    //类型表的数组对象
    function news_type_obj($sql){
        $type_obj=$this->query_date($sql);
        $arr_type_obj=null;
        for ($i=0;$i<count($type_obj);$i++){
            $newstype=new news_type();
            $newstype->setNewsTypeId($type_obj[$i][0]);
            $newstype->setNewsTypeType($type_obj[$i][1]);
            $arr_type_obj[$i]=$newstype;
        }
        return $arr_type_obj;
    }
}
//$db=new DBhelper();
//$arr=$db->query_date("select * from newsInfo");
////while ($arr){
//    var_dump($arr);
////}

