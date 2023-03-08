<?php
include "../Entiy/BookInfo.php";
class DBHelper{
    //创建并获取PDO的对象的方法 返回值就是一个PDO
    function getPDO(){
        //连接字符串  host=localhost 表示数据库服务器的位置：本机
        //dbname=bookdb 数据库的名称
        $con_str="mysql:host=localhost;dbname=bookdb";
        //用户名
        $user_name="root";
        //密码
        $user_pwd="root";
        //创建PDO的对象
        $pdo=new PDO($con_str,$user_name,$user_pwd);
        //把创建好的对象返回出去
        return $pdo;
    }
//使用PDO进行数据查询的方法 返回值是一个数组
//拿到的是一个二维数组，需要把这个二维数组转换为一维数组，数组中存入对象
    function query_data($sql){
        //通过getPDO方法去获取PDO的对象
        $pdo=$this->getPDO();
        //获取的对象不是一个数组，是一个查询的结果
        $result=$pdo->query($sql);
        //从查询的结果中拿到数组
        $arr=$result->fetchAll(PDO::FETCH_NUM);
        return $arr;
    }
    //对query方法查询的数组进行重新组装为元素为bookinfo类型的数组
    function  arr_to_obj($sql){
        $arr=$this->query_data($sql);
        $arr_obj=null;
        for ($i=0;$i<count($arr);$i++){
            //创建一个图书的对象 并且对对象的属性赋值
            $bk=new BooKInfo($arr[$i][0],$arr[$i][1],$arr[$i][2],$arr[$i][3],$arr[$i][4],$arr[$i][5],$arr[$i][6]);
            $arr_obj[$i]=$bk;
        }
        return $arr_obj;
    }

}
