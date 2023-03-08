<?php
include "../DB/DBhelper.php";
$db=new DBhelper();
if ($_POST){
    $CartId=$_POST['shopId'];
    $userId=$_POST['userId'];
    $datetime=date('Y-m-d H:i:s');
    $status=1;
    for ($i=0;$i<count($CartId);$i++){
        $shop_arr=$db->queryData("select * from shopCart where id=".$CartId[$i]);
        $shopId=$shop_arr[0]['shopId'];
        $shopClassify=$shop_arr[0]['shopClassify'];
        $se_sql=$db->queryData("select * from producttypeinfo where id=".$shopClassify);
        $shop_price=$se_sql[0]['price'];
        $shopNum=$shop_arr[0]['shopNum'];
        $sum_price=$shop_price*$shopNum;
        $de_sql="delete from shopCart where id=?";
        $de_con=$db->add_delete_insert($de_sql);
        $de_stmt=$de_con->prepare($de_sql);
        $de_stmt->bind_param('i',$CartId[$i]);
        $de_stmt->execute();
        $sql="insert into orderShopInfo (userId, shopId, shopClassify,price, shopNum,status, datetime) values(?,?,?,?,?,?,?)";
        $con=$db->add_delete_insert($sql);
        $stmt=$con->prepare($sql);
        $stmt->bind_param("iiisiis",$userId,$shopId,$shopClassify,$sum_price,$shopNum,$status,$datetime);
        $flag=$stmt->execute();
    }
    if($flag){
        echo "success";
    }else{
        echo "error";
    }
}

