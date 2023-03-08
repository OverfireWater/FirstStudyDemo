<?php

class DBhelper
{
    function GetCon()
    {
        $con = new mysqli('localhost', 'root', 'root', 'area');
        if ($con->connect_error) {
            die("数据库连接失败" . $con->connect_error);
        }
        return $con;
    }

    function Query($sql)
    {
        $con=$this->GetCon();
        $arr=null;
        $i=0;
        $result=$con->query($sql);
        if($result->num_rows>0){
            while ($rows=$result->fetch_assoc()){
                $arr[$i]=$rows;
                $i++;
            }
        }
        return $arr;
    }


}