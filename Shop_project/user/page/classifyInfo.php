<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
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
            width: 1200px;
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
    </style>
</head>
<?php
include "../DB/DBhelper.php";
$db=new DBhelper();
if ($_GET['id']){
    $id=$_GET['id'];
}
$con=$db->queryData("select * from shopClassify where parent=".$id);
?>
<body bgcolor="white">
<!--            头-->
<div class="nav">

    <div class="main fl" style="color: grey">
        <ul style="float:left;margin: 0">
            <img style="border-radius: 50%" src="../img/01.png" width="51" height="51" alt="">
        </ul>
        <ul style="float:left;padding-left: 20px !important;">
            <span>欢迎admin进入购物网址</span>
        </ul>
    </div>
    <div class="user fr" style="color: gray">
        <ul>
            <a href="">我的淘宝</a>
            <a href="">购物车</a>
            <a href="">收藏夹</a>
            <a href="">商品分类</a>
            <a href="">免费开店</a>
            &nbsp; &nbsp; &nbsp;
        </ul>
    </div>
</div>

<div class="stk">
    <div class="search">
        <div class="div">
            <img width="100" height="65" src="images/10.jpg" alt="">
        </div>
        <div class="search-auto">
            <input class="inp-search" type="text"  placeholder="输入关键字搜索">
            <button class="but-search">搜索</button>
        </div>
    </div>
</div>
<!--            尾部-->
<div class="body-data border-radius">
    <!--    精选内容title-->
    <div class="search-data-title">
        <h2>精选内容</h2>
    </div>
    <!--    商品信息-->
    <div class="information-body-item">
        <?php
            if (!empty($con)){
                for ($i=0;$i<count($con);$i++){
                    $classifyId=$con[$i]['id'];
                    $shopInfo=$db->queryData("select * from shopInfo where classifyId=".$classifyId);
                    $shopId=$shopInfo[0]['id'];
                    $shopImg=$db->queryData("select * from shopImgInfo where shopImgId=".$shopId);
                    $type_money=$db->queryData("select * from ProductTypeInfo where shopid=".$shopId);
                    if (!empty($shopInfo)){
        ?>

            <div class="shop-information-border">
                <a href="detail.php?id=<?=$shopId?>">
                    <div style="padding: 10px;display: inline-block">
                        <div style="float:left;">
                            <img class="border-radius" width="160" height="160" src="<?=$shopImg[0]['img']?>" alt="">
                        </div>
                        <div class="shop-information-text">
                                <span><?=$shopInfo[0]['shopname']?></span>
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
            }
        ?>
    </div>
</div>
</body>
<script>
</script>
</html>