<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>海贼王</title>
    <link rel="icon" href="images/favicon.ico">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/detail.css">
    <link rel="stylesheet" href="css/dh.css">
    <script src="../JS/message.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <style>
        body{
            font: 12pt tahoma, arial, 'Hiragino Sans GB', '\5b8b\4f53', sans-serif;
            background-color: #e9e9e9;
            margin: 0;
            padding: 0;
        }
        .shopping-classify-border {
            cursor: pointer;
            height: 35px;
            float: left;
            line-height: 35px;
            background-color: rgba(0,0,0,.06);
            border-radius: 10px;
            margin-right: 20px;
            margin-bottom: 20px;
            border: 1px solid rgba(0,0,0,0);
        }
        .shopping-classify-border p {
            padding: 0 5px;
            letter-spacing: 2px;
            font-size: 14px;
            font-weight: 500;
        }
        input[name='classify']:checked+span{
            border-color: red;
            color: red;
            background-color: white;
            transition: all 0.5s;
        }
    </style>
</head>
<?php
session_start();
?>
<body bgcolor="#e9ded8">
<!--            头-->
<div class="nav">

    <div class="main fl" style="color: grey">
        <ul style="float:left;margin: 0">
            <img style="border-radius: 50%" src="images/5.jpg" width="51" height="51" alt="">
        </ul>
        <ul style="float:left;padding-left: 20px !important;">
            <span>欢迎<?=$_SESSION['username']?>进入优品购物网站</span>
        </ul>
    </div>
    <div class="user fr" style="color: gray">
        <ul>
            <a href="../PersonalCenter/orderInfo.php">个人中心</a>
            <a href="shopCart.php">购物车</a>
            &nbsp; &nbsp; &nbsp;
        </ul>
    </div>
</div>
<!-- 产品开始 -->
<div class="product">
    <form action="../../egpro/test1.php" method="post">
    <!-- 返回页面顶部 -->
    <div class="back-top" id="back-top">回顶部</div>
    <div class="wrap">
        <!--返回上一页-->
        <div class="back-history-border" onclick="history.back()">
            <span class="back-history-font" >返回上一页</span>
        </div>
        <div class="product-info">
            <div class="small-box radius">
                <?php
                include "../DB/DBhelper.php";
                $db=new DBhelper();
                if ($_GET['id']) {
                    $id = $_GET['id'];
                    $sql_pic = "select * from shopImgInfo where shopImgId=" . $id;
                    $sql_shopInfo="select * from shopInfo where id=".$id;
                    $arr = $db->queryData($sql_pic);
                    $arr_shop=$db->queryData($sql_shopInfo);
                ?>
                <img width="350" height="350" style="border-radius: 20px" src="<?=$arr[0]['img']?>" alt="" class="small-img radius">
                <?php
                }
                ?>
                <!-- 放大镜 -->
                <div class="glass">

                </div>
                <!-- 大盒子 -->
                <div class="big-box">
                    <img src="<?=$arr[0]['img']?>" alt="">
                </div>
            </div>
            <div class="product-list">
                <a href="javascript:void(0);" class="arrow-prev"></a>
                <a href="javascript:void(0);" class="arrow-next"></a>
                <div class="list-info">
                    <ul>
                        <?php
                        if (!empty($arr)){
                            for ($i=0;$i<count($arr);$i++){
                                $img=$arr[$i];
                        ?>
                        <li class="img ">
                            <img width="54" height="50"  class="radius1" src="<?=$img['img']?>" alt="">
                        </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <script>
            $(function (){
                $('.img:first').addClass('img-hover');
                $('input[name="classify"]:first').attr('checked','true');
            });
        </script>
        <?php
        $money=($arr_shop[0]['price']*$arr_shop[0]['discount'])/100;
        ?>
        <div class="item-info">
            <div class="item-top">
                <div class="shop-title">
                    <p><?=$arr_shop[0]['shopname']?></p>
                </div>
                <div class="shop-money">
                    <p style="color: red">价格：￥<span id="type_price"></span></p>
                </div>
                <div class="shop-address">
                </div>
                <div class="shop-classify">

                    <span class="shop-span-classify"><p>商品分类：</p></span>
                    <span class="shop-span-border">
                        <?php
                            $sql_type="select * from ProductTypeInfo where shopId=".$id;
                            $arr_shop_type=$db->queryData($sql_type);
                            if (!empty($arr_shop_type)){
                                for ($i=0;$i<count($arr_shop_type);$i++){
                                    $shop_type=$arr_shop_type[$i];
                        ?>
                        <label for="<?=$shop_type['id']?>">
                            <input type="radio" style="display: none" id="<?=$shop_type['id']?>" name="classify" value="<?=$shop_type['id']?>">
                            <span class="shopping-classify-border">
                             <p><?=$shop_type['productType']?></p>
                            </span>
                        </label>
                        <?php
                                }
                            }
                        ?>
                </div>
                <div style="display: inline-block;width: 100%">
                    <div class="shop-number" style="float:left;">
                        <span><p>数量：</p></span>
                    </div>
                    <div class="cart" style="margin-left:32px;margin-top:3px;float:left;">

                        <input type="text" class="buy-num" id="number" value="1">
                        <a href="javascript:void();" class="add">+</a>
                        <a href="javascript:void();" class="minus disablede">-</a>
                    </div>
                </div>
            </div>

            <div class="shopping-cart">
                <div class="shop-purchase" id="pay_shop">
                    <span class="purchase">立即购买</span>
                </div>
                <div class="shop-add-cart" id="add_shopCart">
                    <span class="add-cart" >加入购物车</span>
                </div>
            </div>

        </div>
    </div>
    </form>
    <!-- 产品结束 -->
    <!-- 主体开始 -->
    <div class="container">
        <div class="wrap">
            <div class="con-right">
                <div class="tab-main">
                    <ul style="padding: 0">
                        <li class="tab-active">商品介绍</li>
                        <li>商品评价</li>
                    </ul>
                </div>
                <div class="tab-con">
                    <div class="tab-items con-active">
                        <?php
                            $sql_intro="select * from ShopIntroductionInfo where shopId=".$id;
                            $intro=$db->queryData($sql_intro);
                            if (!empty($intro)){
                                for ($i=0;$i<count($intro);$i++){
                                    $img=$intro[$i];
                        ?>
                        <img width="1170" src="<?=$img['Shopimg']?>" alt="">
                        <?php
                                }
                            }
                        ?>
                    </div>
                    <div class="tab-items">
                        <div style="width: 1000px;height: 500px;border: 1px solid"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 主体结束 -->
<script src="js/detail.js"></script>
</body>
<script>
    $(function (){
        var type_id=$('input[name="classify"]:checked').val();
        $.ajax({
            type:"post",
            url:"../Services/shopTypePriceServices.php",
            data:{"type_id":type_id},
            dataType:"text",
            success:function (result){
                $('#type_price').text(result);
            }
        });
        $('input[name="classify"]').click(function (){
            type_id=$(this).val();
            $.ajax({
                type:"post",
                url:"../Services/shopTypePriceServices.php",
                data:{"type_id":type_id},
                dataType:"text",
                success:function (result){
                    $('#type_price').text(result);
                }
            });
        });
    //    加入购物车ajax
        $('#add_shopCart').click(function (){
            var number=$('#number').val();
            $.ajax({
                type:"post",
                url:"../Services/addShopCart.php",
                data:{"userId":<?=$_SESSION['userId']?>, "shopId":<?=$id?>,"type_id":type_id,"number":number},
                dataType:"text",
                success:function (result){
                    if (result=="success"){
                        showMessage('加入购物车成功','success',2000);
                    }else {
                        showMessage('加入购物车失败','error',2000);
                    }
                }
            });
        });
//    购买
        $('#pay_shop').click(function (){
            var number=$('#number').val();
            window.location.href="shopPay.php?userId="+<?=$_SESSION['userId']?>+"&&shopId="+<?=$id?>+"&&type_id="+type_id+"&&number="+number;
        });
    });
</script>
</html>