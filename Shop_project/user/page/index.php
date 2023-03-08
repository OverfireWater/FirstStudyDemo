<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>购物商城</title>
    <link rel="stylesheet" href="css/body.css">
    <link rel="stylesheet" href="css/dh.css">
    <script src="js/jquery-1.8.3.min.js"></script>
    <script>
        $(function (){
            $('.item,.btn').mouseover(function (){
                $('.btn').removeAttr("style","");
            }).mouseout(function (){
                $('.btn').css("display","none");
            });
        });
    </script>
    <style>
        body{
            /*font-size: 12pt;*/
            /*font-family: Arial;*/
            font: 12pt tahoma, arial, 'Hiragino Sans GB', '\5b8b\4f53', sans-serif;
            background-color: #e9e9e9;
            margin: 0;
            padding: 0;
        }
        .search{
            width: 100%;
            height: 65px;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .search-auto{
            width: 500px;
            height: 40px;
            border-radius: 30px;
            float: left;
            margin-top: 10px;
            border: 2px solid red;
            background-color: white;
        }
        .inp-search{
            width: 410px;
            height: 40px;
            border:none;
            padding: 0;
            font-size: 16px;
            margin-left: 20px;
            outline: none;
            float: left;
        }
        .but-search{
            border: 2px solid white;
            background-color: red;
            border-radius: 30px;
            height: 40px;
            width: 70px;
            color: white;
            font-size: 16px;
            letter-spacing: 1px;
        }
        .div{
            margin-left: 350px;
            margin-right: 100px;
            float: left;
        }
        .more_classify{
            margin-left: 143px;
        }
    </style>
</head>
<?php
session_start();
?>
<body>
<!--            头-->
    <div class="nav">

        <div class="main fl" style="color: grey">
            <ul style="float:left;margin: 0">
                <img style="border-radius: 50%" src="img/shop.jpg" width="51" height="51" alt="">
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

<div class="stk">
    <div class="search">
        <div class="div">
            <img width="100" height="65" src="img/OIP-C.jpg" alt="">
        </div>
        <div class="search-auto">
            <input class="inp-search" type="text"  placeholder="输入关键字搜索">
            <button class="but-search">搜索</button>
        </div>
    </div>
</div>
<!--            尾部-->
<div class="body-data border-radius">
    <div class="body-data-border">
        <!--        分类商品-->
        <div class="classify border-radius">
            <div class="classify-border">
                <!--                内容-->
                <div style="text-align: left">
                    <span>分类</span>
                    <br>
                    <?php
                    include "../DB/DBhelper.php";
                    $db=new DBhelper();
                    $classify=$db->queryData('select * from shopClassify_const');
                    for ($i=0;$i<37;$i+=3){
                    ?>
                    <span class="font-marign"><p><a href="classifyInfo.php?id=<?=$classify[$i]['id']?>"><?=$classify[$i]['classifyParentName']?></a>/
                            <a href="classifyInfo.php?id=<?=$classify[$i+1]['id']?>"><?=$classify[$i+1]['classifyParentName']?></a>/
                            <a href="classifyInfo.php?id=<?=$classify[$i+2]['id']?>"><?=$classify[$i+2]['classifyParentName']?></a></p></span>
                    <?php
                    }
                    ?>
                    <span class="more_classify"><a href="">更多...</a></span>
                </div>
            </div>
        </div>
        <!--        轮播图-->
        <div class="body-img-map border-radius">
            <div class="wrap">
                <ul class="list">
                    <?php
                    $con=$db->queryData("select * from bannerInfo where status=1");
                    if (!empty($con)){
                        for ($i=0;$i<count($con);$i++){
                            $img=$con[$i];
                    ?>
                    <li class="item"><img class="border-radius" width="850" height="544" src="<?=$img['banner']?>" alt=""></li>
                    <?php
                        }
                    }
                    ?>
                </ul>
                <ul class="pointList">
                    <?php
                    $img_count=$db->queryData("select count(*) as count from bannerInfo where status=1");
                    $count=$img_count[0]['count'];
                    if (!empty($img_count)){
                        for ($i=0;$i<$count;$i++){
                    ?>
                    <li class="point" data-index=<?=$i?>></li>
                    <?php
                        }
                    }
                    ?>
                </ul>
                <div class="btn left" style="display: none" id="leftBtn"><</div>
                <div class="btn right" style="display: none" id="rightBtn">></div>

            </div>
        </div>
    </div>
    <script>
        $(function (){
            $('.item:first').addClass('active');
            $('.point:first').addClass('active');
        });
    </script>
    <!--    精选内容title-->
    <div class="data-title">
        <h2>精选内容</h2>
    </div>
    <!--    商品信息-->
    <div class="information-body-item">
        <?php
        $shop_arr=$db->shopInfo_to_obj("select * from shopInfo where recommend=1 and vpi=1 and status=1");
        if (!empty($shop_arr)){
            for ($i=0;$i<count($shop_arr);$i++){
                $shopInfo=$shop_arr[$i];
                $id=$shopInfo->getId();
                $type_money=$db->queryData("select * from ProductTypeInfo where shopid=".$id);
                $shopPic=$db->queryData("select * from shopImgInfo where shopImgId=".$id);
        ?>
            <div class="shop-information-border">
                <a href="detail.php?id=<?=$id?>">
                    <div style="padding: 10px;display: inline-block">
                        <div style="float:left;">
                            <img class="border-radius" width="160" height="160" src="<?=$shopPic[0]['img']?>" alt="">
                        </div>
                        <div class="shop-information-text">
                                <span><?=$shopInfo->getName()?></span>
                                <div class="shop-money-font">
                                    <span>￥<?=$type_money[0]['price']?></span>
                                </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php
            }
        }
        ?>
    </div>
    <!--    新品上市title-->
    <div class="data-title">
        <h2>新品上市</h2>
    </div>
    <!--    商品信息-->
    <div class="information-body-item">
        <?php
        $shop_arr=$db->shopInfo_to_obj("select * from shopInfo where recommend=1 and vpi=0 and status=1");
        if (!empty($shop_arr)){
            for ($i=0;$i<count($shop_arr);$i++){
                $shopInfo=$shop_arr[$i];
                $id=$shopInfo->getId();
                $type_money=$db->queryData("select * from ProductTypeInfo where shopid=".$id);
                $shopPic=$db->queryData("select * from shopImgInfo where shopImgId=".$id);
                ?>
                <div class="shop-information-border">
                    <a href="detail.php?id=<?=$id?>">
                        <div style="padding: 10px;display: inline-block">
                            <div style="float:left;">
                                <img class="border-radius" width="160" height="160" src="<?=$shopPic[0]['img']?>" alt="">
                            </div>
                            <div class="shop-information-text">
                                <span><?=$shopInfo->getName()?></span>
                                <div class="shop-money-font">
                                    <span>￥<?=$type_money[0]['price']?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
            }
        }
        ?>
    </div>
    <!--    热门推荐title-->
    <div class="data-title">
        <h2>热门推荐</h2>
    </div>
    <!--    商品信息-->
    <div class="information-body-item">
        <?php
        $shop_arr=$db->shopInfo_to_obj("select * from shopInfo where vpi=0 and recommend=0 and status=1" );
        if (!empty($shop_arr)){
            for ($i=0;$i<count($shop_arr);$i++){
                $shopInfo=$shop_arr[$i];
                $id=$shopInfo->getId();
                $type_money=$db->queryData("select * from ProductTypeInfo where shopid=".$id);
                $shopPic=$db->queryData("select * from shopImgInfo where shopImgId=".$id);
                ?>
                <div class="shop-information-border">
                    <a href="detail.php?id=<?=$id?>">
                        <div style="padding: 10px;display: inline-block">
                            <div style="float:left;">
                                <img class="border-radius" width="160" height="160" src="<?=$shopPic[0]['img']?>" alt="">
                            </div>
                            <div class="shop-information-text">
                                <span><?=$shopInfo->getName()?></span>
                                <div class="shop-money-font">
                                    <span>￥<?=$type_money[0]['price']?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>
</body>
<script>
    var items = document.querySelectorAll(".item");//图片
    var points = document.querySelectorAll(".point")//点
    var left =document.getElementById('leftBtn');
    var right = document.getElementById("rightBtn");
    var all = document.querySelector(".wrap")
    var index = 0;
    var time = 0;//定时器跳转参数初始化


    //清除active方法
    var clearActive = function () {
        for (i = 0; i < items.length; i++) {
            items[i].className = 'item';
            console.log(i);
        }
        for (j = 0; j < points.length; j++) {
            points[j].className = 'point';
        }
    }

    //改变active方法
    var goIndex = function () {
        clearActive();
        items[index].className = 'item active';
        points[index].className = 'point active';
        // console.log(index);
    }
    //左按钮事件
    var goLeft = function () {
        if (index == 0) {
            index = points.length-1;
        } else {
            index--;
        }
        goIndex();
    }

    //右按钮事件
    var goRight = function () {
        if (index < points.length-1) {
            index++;
        } else {
            index = 0;
        }
        goIndex();
    }


    //绑定点击事件监听
    left.addEventListener('click', function () {
        goLeft();
        time = 0;//计时器跳转清零
    })

    right.addEventListener('click', function () {
        goRight();
        time = 0;//计时器跳转清零
    })

    for (i = 0; i < points.length; i++) {
        points[i].addEventListener('click', function () {
            var pointIndex = this.getAttribute('data-index')
            index = pointIndex;
            // alert(pointIndex);
            goIndex();
            time = 0;//计时器跳转清零
        })
    }
    //计时器
    var timer;

    function play() {
        timer = setInterval(() => {
            time++;
            if (time == 20) {
                goRight();
                time = 0;
            }
        }, 150)
    }

    play();
    //移入清除计时器
    all.onmousemove = function () {
        clearInterval(timer)
    }
    //移出启动计时器
    all.onmouseleave = function () {
        play();
    }
</script>

</html>