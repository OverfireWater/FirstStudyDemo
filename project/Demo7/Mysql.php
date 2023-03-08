<?php
class DBhelper{
    function getcon(){
        $con=new mysqli("localhost","root","root","news");
        if($con->connect_errno){
            die("连接失败".$con->connect_errno);
        }
        echo "连接成功";
        return $con;
    }
    function getcon_1(){
        $con=mysqli_connect("localhost","root","root","mangerdb");
        if($con->connect_errno){
            die("连接失败".$con->connect_errno);
        }
        echo "连接成功";
        return $con;
    }
}
//$db=new DBhelper();
//$con=$db->getcon_1();
//$sql="select * from departInfo";
//$result=$con->query($sql);
//if($result->num_rows>0){
//    while ($rows=$result->fetch_assoc()){
//       echo $rows['departName'];
//    }
//}


//方法一
//$sql="insert into bookinfo values(9,'《猪猪侠》','猪猪棒','2002-10-24','猪猪侠的奇妙生活','无')";
//$flag=$con->multi_query($sql);
//if($flag){
//    echo "添加成功";
//}else{
//    echo "添加失败";
//}

//方法二
//面向过程

//预处理sql语句
//$sql="insert into bookinfo values(?,?,?,?,?,?)";
////预处理对象
//$stmt=mysqli_stmt_init($con);
////处理预处理sql语句
//mysqli_stmt_prepare($stmt,$sql);
//$id=10;
//$name="《疯狂摆锤》";
//$author="摆锤";
//$date="2002-10-11";
//$intro="疯狂摇摆";
//$remark="无";
////预处理绑定对象
//mysqli_stmt_bind_param($stmt,'isssss',$id,$name,$author,$date,$intro,$remark);
////执行
//mysqli_stmt_execute($stmt);

//方法三
//面向对象
$db=new DBhelper();
$sql="insert into employee values(?,?,?,?,?,?,?,?,?)";
$con=$db->getcon_1();
$con->multi_query($sql);
$name="";
$age="";
$sex="";
$depart_index="";
$telphone="";
$address="";
$xueli="";
$remark="";
$stmt=$con->prepare($sql);

$stmt->bind_param("isisissss", $arr_id,$name,$age,$sex,$depart_index,$telphone,$address,$xueli,$remark);
$count=$stmt->execute();

if($count>0){
    echo "添加成功";
}else{
    echo "添加失败";
}


//删除

//$sql="delete from bookinfo where book_id=?";
//$con->multi_query($sql);
//
//$id=10;
//$stmt=$con->prepare($sql);
//$stmt->bind_param('i',$id);
////$stmt->execute();


//修改
//$sql="update bookinfo set Book_name=?,Book_Author=?,Book_Date=?,Book_intro=?,remark=? where Book_id=?";
//
////执行SQL语句
//$con->multi_query($sql);
//$id=6;
//$name="《那个冬天》";
//$author="冬天";
//$date="2002-10-11";
//$intro="那个冬天有你足以";
//$remark="无";
//$stmt=$con->prepare($sql);
//$stmt->bind_param('sssssi',$name,$author,$date,$intro,$remark,$id);
//
//$stmt->execute();



