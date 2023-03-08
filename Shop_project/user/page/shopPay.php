<!DOCTYPE html>
<html>
<?php
session_start();
?>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/dh.css" />
    <link rel="stylesheet" href="css/dh.css">
    <script src="js/jquery-1.8.3.min.js"></script>
    <link rel="stylesheet" href="layui/css/layui.css">
    <script src="layui/layui.js"></script>
    <title>我的购物车</title>
    <style>
        ul{
            margin: 16px!important;
        }
        body {
            height: 100%;
            font: 12pt tahoma, arial, 'Hiragino Sans GB', '\5b8b\4f53', sans-serif;
            background-color: #e9e9e9;
            margin: 0;
            padding: 0;
        }
        .header{
            font-size: 12px;
            border-bottom: 2px solid #ff6700;
            background: #fff;
            color: #b0b0b0;
            position: relative;
            z-index: 20;
            height: 100px;
        }
        .header .container {
            position: relative;
            width: 1226px;
            margin-right: auto;
            margin-left: auto;
        }
        .header .container .header-logo {
            width: 93px;
            margin-top: 26px;
        }

        .logo {
            width: 48px;
            height: 48px;
            position: relative;
            display: block;
            width: 55px;
            height: 55px;
            overflow: hidden;
            background-color: #ff6700;
        }
        .header-title {
            float: left;
            margin-top: 26px;
            font-size: 12px;
        }
        .topbar-info {
            margin-top: 30px;
            line-height: 40px;
        }
        .link {
            padding: 0 5px;
            color: #757575;
            text-decoration: none;
        }
        .hid {
            overflow: hidden;
        }
        .left {
            float: left;
        }
        .box_head{
            position: relative;
            margin: 0;
            height: 50px;
            font-size: 30px;
            font-weight: 400;
            color: #757575;
            border-top: 1px solid #e0e0e0;
        }
        .box_head span{
            position: absolute;
            top: -20px;
            left: 372px;
            height: 40px;
            width: 482px;
            line-height: 40px;
            text-align: center;
            display: block;
            background-color: #f5f5f5;
            font-size: 30px;
        }
        #box {
            width:1240px;
            margin: 20px auto;
        }
        #box ul {
            margin-right: -14px;
            overflow: hidden;
        }
        #box li {
            width: 234px;
            float: left;
            margin-right: 14px;
            padding: 24px 0 20px;
            background: #FFF;
            text-align: center;
            position: relative;
            cursor: pointer;
            margin-bottom:14px;
        }
        .pro_img {
            width: 150px;
            height: 150px;
            margin: 0 auto 18px;
        }
        .pro_name {
            display: block;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            font-weight: 400;
        }
        .pro_name a {
            color: #333;
        }
        .pro_price {
            color: #ff6700;
            margin: 10px;
        }
        .pro_rank {
            color: #757575;
            margin: 10px;
        }
        #box li:hover .add_btn {
            display: block;
        }
        #box li:hover .pro_rank {
            opacity: 0;
        }
        #box li .add_btn:hover {
            background-color: #f60;
            color: white;
        }



        .add_btn {
            height: 22px;
            position: absolute;
            width: 122px;
            bottom: 28px;
            left: 50%;
            margin-left: -61px;
            line-height: 22px;
            display: none;
            color: #F60;
            font-size: 12px;
            border: 1px solid  #f60;
        }
        .car {
            width: 1240px;
            margin: 20px auto;
            background: #FFF;
        }
        .car .check{
            width: 50px;

        }
        .car .check i{
            color: #fff;
            display: inline-block;

            width: 18px;
            height: 18px;
            line-height: 18px;
            border: 1px solid #e0e0e0;
            margin-left: 24px;
            background-color: #fff;
            font-size: 16px;
            text-align: center;
            vertical-align: middle;
            position: relative;
            top: -1px;
            cursor: pointer;
            font-family: "iconfont";
        }
        .i_acity {

            border-color: #ff6700 !important;
            background-color: #ff6700 !important;
        }
        .car .img {
            width: 190px;
        }
        .car .img img {
            display: block;
            width: 80px;
            height: 80px;
            margin: 3px auto;
        }
        .car .name {
            width: 300px;
        }
        .car .name span{
            line-height: 1;
            margin-top: 8px;
            margin-bottom: 8px;
            font-size: 18px;
            font-weight: normal;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }
        .car .price {
            width: 144px;
            text-align: right;
            padding-right: 84px;
        }
        .car .price span {
            color: #ff6700;
            font-size: 16px;
        }
        .car .number{
            width: 150px;
        }
        .car .subtotal{
            width: 130px;

        }
        .car .ctrl {
            width: 105px;
            padding-right:25px;
            text-align: center;
        }
        .car .ctrl a {
            font-size: 20px;
            cursor: pointer;
            display: block;
            width: 26px;
            height: 26px;
            margin: 30px auto;
            line-height: 26px;
        }
        .car .ctrl a:hover {
            color: #FFF;
            background: #ff6700;
            border-radius: 50%;
        }
        .head_row {
            height: 70px;
            line-height: 70px;
        }
        .head_row, .row {
            border-bottom: solid 1px #e0e0e0;
        }
        .row {
            height: 86px;
            line-height:86px;
            padding: 15px 0;
            margin: 0px;
        }
        #sum_area{
            width:1240px;
            height: 60px;
            background: white;
            margin: 20px auto;
        }
        #sum_area #pay{
            width:250px;
            height:60px;
            text-align: center;
            float: right;
            line-height: 60px;
            font-size: 19px;
            background: #FF4B00;
            color: white;
        }
        #sum_area #pay_amout{
            width:250px;
            height:60px;
            text-align: center;
            float: right;
            line-height: 60px;
            font-size: 16px;
            color:#FF4B00 ;
        }
        #sum_area #pay_amout #price_num{
            width:100px;
            height: 60px;
            font-size: 25px;
            color:#FF4B00 ;
            /*	float: left;*/
        }

        .item_count_i{
            height: 85px;
            width:10%;
            /*border: 1px solid black;*/
            float: left;
            margin-right: 25px;
        }
        .num_count{
            width:150px;
            height:40px;
            border: 1.2px solid #E0E0E0;
            float:right;
            margin-top: 21px;

        }
        .count_i{
            width:30%;
            height:40px;
            line-height: 40px;
            float: left;
            text-align: center;
            font-size:21px;
            color: #747474;
        }
        .count_i:hover{
            width:30%;
            height:40px;
            line-height: 40px;
            float: left;
            text-align: center;
            font-size:21px;
            color: #747474;
            background: #E0E0E0;
            cursor: pointer;
        }
        .c_num{
            width:40%;
            height:40px;
            line-height: 40px;
            float: left;
            text-align: center;
            font-size:16px;
            color: #747474;
        }
        .count_d{
            width:30%;
            height:40px;
            line-height: 40px;
            float: left;
            text-align: center;
            font-size:25px;
            color: #747474;
        }
        .count_d:hover{
            width:30%;
            height:40px;
            line-height: 40px;
            float: left;
            text-align: center;
            font-size:25px;
            color: #747474;
            background: #E0E0E0;
            cursor: pointer;
        }
        .i_acity2 {
            border-color: #ff6700 !important;
            background-color: #ff6700 !important;
        }.topbar-info{
            text-align: right;
            height: 100px;
            line-height: 100px;
                 }.like{ font-size:65px;  color:#ccc; cursor:pointer;text-align: right}
        .cs{color:#f00;}

        .wight{
            width: 300px;
            float: left;
            line-height: 1;
            margin-top: 8px;
            margin-bottom: 8px;
            font-size: 18px;
            font-weight: normal;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }
        .shop-name-title{
            font-size: 18px;
        }
        .shop-classify-name{
            margin-top: 20px;
            font-size: 15px;
        }
        .checkshop{
            width: 20px;
            height: 20px;
            margin-left: 24px;
            margin-top: 25px;
        }
        .de-but:hover{
            cursor: pointer;
        }
        .warp-address{
            height: 150px;
        }
        .address_border{
            width: 200px;
            padding: 15px 40px;
        }
        .h{
            padding-top: 5px;
        }
    </style>
</head>
<body>
<!--            头-->
<div class="nav">

    <div class="main fl" style="color: grey">
        <ul style="float:left;margin: 0!important;padding-left: 40px">
            <img style="border-radius: 50%" src="" width="51" height="51" alt="">
        </ul>
        <ul style="float:left;padding-left: 20px !important;">
            <span>欢迎<?=$_SESSION['username']?>进入购物网址</span>
        </ul>
    </div>
    <div class="user fr" style="color: gray">
        <ul>
            <a href="">我的淘宝</a>
            <a href="shopCart.php">购物车</a>
            <a href="">收藏夹</a>
            <a href="">商品分类</a>
            <a href="">免费开店</a>
            &nbsp; &nbsp; &nbsp;
        </ul>
    </div>
</div>
<div class="car">
    <div class="warp-address">
        <div class="address_border">
            <div><span style="font-size: 18px;color: black">收货地址</span></div>
            <div style="margin-top: 10px"><span>四川广安</span></div>
            <div class="h"><span>广安区广安职业技术学院</span></div>
            <div class="h"><span>某人收</span>&nbsp;&nbsp;&nbsp;<span>15328553517</span></div>
        </div>
    </div>
</div>
<div id="car" class="car">
    <div class="head_row hid">
        <div class="img left">&nbsp;</div>
        <div class="name left span">商品名称</div>
        <div class="price left">单价</div>
        <div class="number left">数量</div>
        <div class="subtotal left">小计</div>
        <div class="ctrl left">状态</div>
    </div>
    <?php
    include "../DB/DBhelper.php";
    $db=new DBhelper();
    if ($_GET){
        $userId=$_GET['userId'];
        $shopId=$_GET['shopId'];
        $type_id=$_GET['type_id'];
        $number=$_GET['number'];
    }
    $con_img=$db->queryData("select * from shopImgInfo where shopImgID=".$shopId);
    $con_shop_name=$db->queryData("select * from shopInfo where id=".$shopId);
    $con_shop_classify=$db->queryData("select * from producttypeinfo where id=".$type_id);
    $price_num=($con_shop_classify[0]['price']*$number);
    ?>
    <div class="row hid">
        <div class="img left"><img src="<?=$con_img[0]['img']?>" width="80" height="80"></div>
        <div class="wight">
            <div class="shop-name-title"><?=$con_shop_name[0]['shopname']?></div>
            <div class="shop-classify-name"><?=$con_shop_classify[0]['productType']?></div>
        </div>
        <div class="price left"><span><?=$con_shop_classify[0]['price']?>元</span></div>
        <div class="item_count_i"><div class="num_count"><div class="count_d">-</div><div class="c_num"><?=$number?></div><div class="count_i">+</div></div> </div>
        <div class="subtotal left"><span id="sum_price"><?=$price_num?>元</span></div>
        <div class="ctrl left">未支付</div>
    </div>
</div>
<div id="sum_area">
    <a href="javascript:void(0); "  style="color: white"><div id="pay">去结算</div></a>
    <div id="pay_amout">合计：<span id="price_num">0</span>元</div>
</div>
</body>
<script>
    $(function (){
        //支付之后生成订单，写入数据库
        $('#pay').click(function (){
            var price=document.getElementsByClassName('subtotal')[1];
            price=parseInt(price.innerText);
            var number=document.getElementsByClassName('c_num')[0].innerHTML;
                $.ajax({
                    type:'post',
                    url:'../Services/addOrderConstService.php',
                    data:{'shopId':<?=$shopId?>,'userId':<?=$_SESSION['userId']?>,"type_id":<?=$type_id?>,"price":price,"number":number},
                    dataType:'text',
                    success:function (result){
                        if (result=="success"){
                            window.location.replace('paySuccess.php');
                        }
                        if (result=="error"){
                            layer.msg('结算失败！',{icon:0});
                        }
                    },
                });
        });
    });
    window.onload = function() {
        getAmount();
        var i_btn = document.getElementsByClassName("count_i");
        for (var k = 0; k < i_btn.length; k++) {
            i_btn[k].onclick = function () {
                bt = this;
                // console.log(bt);
                //获取小计节点
                at = this.parentElement.parentElement.nextElementSibling;
                //获取该商品的id
                var shopId=this.parentElement.parentElement.parentElement.firstElementChild.childNodes[0].value;

                //获取单价节点
                pt = this.parentElement.parentElement.previousElementSibling;
                //获取数量值
                node = bt.parentNode.childNodes[1];
                // console.log(node);
                num = node.innerText;
                num = parseInt(num);
                num++;
                node.innerText = num;
                //获取单价
                price = pt.innerText;
                price = price.substring(0, price.length - 1);
                //计算小计值
                at.innerText = price * num + "元";
                //计算总计值
                getAmount();
            }
        }
        //获取所有的数量减号按钮
        var d_btn = document.getElementsByClassName("count_d");
        for (k = 0; k < i_btn.length; k++) {
            d_btn[k].onclick = function () {
                bt = this;
                //获取小计节点
                at = this.parentElement.parentElement.nextElementSibling;
                //获取单价节点
                pt = this.parentElement.parentElement.previousElementSibling;
                //获取该商品的id
                var shopId=this.parentElement.parentElement.parentElement.firstElementChild.childNodes[0].value;
                //获取c_num节点
                node = bt.parentNode.childNodes[1];
                num = node.innerText;
                num = parseInt(num);
                if (num > 1) {
                    num--;
                }
                node.innerText = num;
                //获取单价
                price = pt.innerText;
                price = price.substring(0, price.length - 1);
                //计算小计值
                at.innerText = price * num + "元";
                getAmount();

            }
        }
    }

    //进行价格合计
    function getAmount() {
        sum = 0;
        //选中框
        document.getElementById("price_num").innerText = sum;
            //小计
            amount_info = document.getElementsByClassName('subtotal');
            // sum_price=amount_info.childNodes[1];
            num = parseInt(amount_info[1].innerText);
            sum += num;
            document.getElementById("price_num").innerText = sum;
    }
</script>
</html>
