<?php
class DBhelper{
    function getcon(){
        $con=new mysqli("localhost","root","root","lottery");
        if ($con->error){
            echo "连接失败".$con->error;
        }
        return $con;
    }
    function student_add_query($sql){
        $con=$this->getcon();
        $con->multi_query($sql);
        return $con;
    }
    function queryDate_student($sql){
        $con=$this->getcon();
        $result=$con->query($sql);
        $i=0;
        $stu_arr=null;
        if ($result->num_rows>0){
            while ($arr=$result->fetch_assoc()){
                $stu_arr[$i]=$arr;
                $i++;
            }
        }
        return $stu_arr;
    }
    function queryDate_ip($sql){
        $con=$this->getcon();
        $result=$con->query($sql);
        $i=0;
        $stu_arr=null;
        if ($result->num_rows>0){
            while ($arr=$result->fetch_assoc()){
                $stu_arr[$i]=$arr;
                $i++;
            }
        }
        return $stu_arr;
    }
}
