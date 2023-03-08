<?php
include "../Enter/BookInfo.php";

class DBhelper
{
    function getPDO()
    {
        //创建连接
        $con_str = "mysql:host=localhost;dbname=bookdb";
        //实例化
        $pdo = new PDO($con_str, "root", "root");
        return $pdo;
    }

    function insert($sql)
    {
        $res = 0;
        $pdo = $this->getPDO();
        $res = $pdo->exec($sql);
        return $res;
    }

    function quary_date($sql)
    {
        $pdo = $this->getPDO();
        $result = $pdo->query($sql);
        $arr = $result->fetchAll(PDO::FETCH_NUM);
        return $arr;
    }

    //获取查询表总行数
    function quary_date_count(){
        $pdo=$this->getPDO();
        $sql="select count( * ) from bookinfo";
        $result=$pdo->query($sql);
        $arr=$result->fetchAll(PDO::FETCH_NUM);
        return $arr[0][0];
    }

    //转换为对象数组
    function arr_to_obj($sql)
    {
        $arr = $this->quary_date($sql);
        $arr_obj = null;
        for ($i = 0; $i < count($arr); $i++) {
            $bk = new BookInfo();
            $bk->setBookId($arr[$i][0]);
            $bk->setBookName($arr[$i][1]);
            $bk->setBookAuthor($arr[$i][2]);
            $bk->setBookDate($arr[$i][3]);
            $bk->setBookIntro($arr[$i][4]);
            $bk->setRemark($arr[$i][5]);
            $bk->setBookImg($arr[$i][6]);
            $arr_obj[$i] = $bk;
        }
        return $arr_obj;
    }
}
