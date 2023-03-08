<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" href="css/safe/css.css"/>
    <link rel="stylesheet" href="css/safe/common.min.css"/>
    <link rel="stylesheet" href="css/safe/ms-style.min.css"/>
    <link rel="stylesheet" href="css/safe/personal_member.min.css"/>
    <link rel="stylesheet" href="css/safe/Snaddress.min.css"/>
    <link rel="stylesheet" href="css/sui.css"/>
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/sui.js"></script>
    <style>
        progress {
            width: 300px;
            border: 1px solid #ffffff;
            background-color: #e6e6e6;
            color: #0064B4;
            /*IE10*/
        }

        progress::-moz-progress-bar {
            background: #FFFFFF;
        }

        progress::-webkit-progress-bar {
            background: #ccc;
        }

        progress::-webkit-progress-value {
            background: #FF7700;
        }

        a {
            color: #000000;
        }

        .sui-table th, .sui-table td {
            padding: 16px 8px;
            line-height: 18px;
            text-align: center;
            vertical-align: middle;
            border-top: 1px solid #e6e6e6;

        }

        .sui-nav.nav-tabs > .active > a {
            border: 1px #fff solid;
            background-color: #fff;
            border-bottom-color: transparent;
            cursor: default;
            font-weight: normal;
            color: #F2873B;
        }

        .sui-nav.nav-tabs > li > a {
            color: #333333;
            line-height: 18px;
            -webkit-border-radius: 3px 3px 0 0;
            -moz-border-radius: 3px 3px 0 0;
            border-radius: 3px 3px 0 0;
            border: 1px #fff solid;
            border-bottom: 1px #fff solid;
            height: 30px;
            width: 80px;
            text-align: center;
            padding-top: 10px;
            font-size: 14px;
        }

        .sui-nav.nav-tabs {
            border-bottom: 1px solid #CECECE;
            padding-left: 5px;
        }

        /*.sui-nav.nav-tabs > .active > a:hover {
              font-weight: bold;
            cursor: default;
            font-weight: bold;
            color: #F37B1D;
        }*/
        .sui-nav.nav-tabs > li {
            margin-bottom: -1px;
            background-color: #fff;
            border-bottom: 1px #ccc solid;
        }

        .sui-nav.nav-tabs > .active {
            border-bottom: 0;
        }

        .sui-nav.nav-tabs > li + li {
            margin-left: -3px;
        }
    </style>

</head>
<?php
session_start();
?>
<script>
    $(function () {

        $('#exit_login').click(function () {
            $('#block_login').toggle(500);
        });
    });
</script>
<body class="ms-body">
<div id="" class="ng-top-banner"></div>
<div class="ng-toolbar">
    <div class="ng-toolbar-con wrapper">
        <div class="ng-toolbar-left">
            <a class="ng-bar-node ng-bar-node-backhome" id="ng-bar-node-backhome" style="display: block;">
                <a href="../page/index.php"><img src="img/Home.png" style="margin-right: 10px;"/>返回商城首页</a>
            </a>
        </div>
        <div class="ng-toolbar-right">
            <div class="ng-bar-node-box username-handle" style="display: block;cursor: pointer">
						<span id="exit_login" rel="nofollow"
                              class="ng-bar-node username-bar-node username-bar-node-noside">
							<span style="font-size: 13px">管理</span>
                            <!--							<em class="hasmsg ng-iconfont"></em>-->
							<em class="ng-iconfont down"></em>
						</span>
                <div class="ng-d-box ng-down-box ng-username-slide" id="block_login" style="display: none">
                    <a href="UdInformation.html" class="ng-vip-union" target="_blank" rel="nofollow">账号管理</a>
                    <a href="login.html" rel="nofollow">退出登录</a>
                </div>
            </div>
            <a class="ng-bar-node ng-bar-node-mini-cart" rel="nofollow" href="">
                <a href="../page/shopCart.php"><img src="img/购物车.png"/>&nbsp;购物车</a>
                <span class="total-num-bg-box">
						<em></em>
						<i></i>
					</span>
                </span>
            </a>
        </div>
        <div id="ng-minicart-slide-box"></div>
    </div>
</div>
<header class="ms-header ms-header-inner ms-head-position">
    <article class="ms-header-menu">
        <style type="text/css">
            .nav-manage .list-nav-manage {
                position: absolute;
                padding: 15px 4px 10px 15px;
                left: 0;
                top: -15px;
                width: 90px;
                background: #FFF;
                box-shadow: 1px 1px 2px #e3e3e3, -1px 1px 2px #e3e3e3;
                z-index: 10;
            }

            .ms-nav li {
                float: left;
                position: relative;
                padding: 0 20px;
                height: 44px;
                font: 14px/26px "Microsoft YaHei";
                color: #FFF;
                cursor: pointer;
                z-index: 10;
            }

            .sui-table th {
                font-weight: normal;
                line-height: 40px
            }

            .sui-table td {
                font-weight: normal;
                line-height: 40px
            }
        </style>
        <div class="header-menu">
            <div class="ms-logo">
                <a class="ms-head-logo" name="Myyigou_index_none_daohangLogo"><span
                        style="font-size: 30px;color: #fff;font-weight: bold;    line-height: 28px;;">我的</span></a>

            </div>
            <nav class="ms-nav">
                <ul>
                    <li class=""><a href="orderInfo.php" data-url=""
                                    style="padding-bottom: 17px;border-bottom: 3px #fff solid;">首页</a><i
                            class="nav-arrow"></i></li>
                    <li class="nav-manage selected">
                        <a href="" data-url="">账户管理<em hidden></em></a><i class="nav-arrow" hidden></i>
                        <div class="list-nav-manage hide">
                            <p class="nav-mge-hover">账户管理<em></em></p>
                            <p><a href="UdInformation.php">个人资料</a></p>
                            <p><a href="address.php">地址管理</a></p>
                        </div>
                    </li>
                </ul>

            </nav>
        </div>

    </article>

    <article class="ms-useinfo">
        <div class="header-useinfo" id="">
            <div class="ms-avatar">
                <div class="useinfo-avatar">
                    <img src="img/头像.png">
                    <div class="edit-avatar"></div>
                    <a class="text-edit-avatar">修改</a>
                </div>
                <a>sunshine</a>
            </div>

            <div class="ms-name-info">
                <div class="link-myinfo">
                    <a>我的编号:99653</a>
                </div>
                <div class="info-member">
							<span style="margin-left: 20px;">
        				 <a href="UdInformation.php" target="_blank">我的资料</a></span>
                </div>
            </div>
        </div>

    </article>
</header>
<script>
    $(function () {
        $("#search").click(function () {
            var act = "orderInfo.php";
            $("#shop_list").attr("action", act).attr("method", "get").submit();
        });
    });
</script>
<div id="ms-center" class="personal-member">
    <div class="cont">
        <div class="cont-side">
            <div class="side-neck" style="margin-top: 20px;">
                <i></i>
            </div>
            <div class="ms-side" style="margin-top: 20px;">
                <article class="side-menu side-menu-off">
                    <dl class="side-menu-tree" style="padding-left: 50px;">
                        <dt><a href="../page/shopCart.php"><img src="img/左侧/我的购物车.png" style="margin-right: 10px;margin-left: -20px;"/>我的购物车</a></dt>
                        <dt><img src="img/左侧/file.png" style="margin-right: 10px;margin-left: -20px;"/>订单管理</dt>
                        <dd>
                            <a href="orderInfo.php" style="color:#f70">我的订单</a>
                        </dd>
                        <dt><img src="img/左侧/我的买啦.png" style="margin-right: 10px;margin-left: -20px;"/>个人中心</dt>
                        <dd>
                            <a href="UdInformation.php">资料修改</a>
                        </dd>
                        <dd>
                            <a href="address.php">管理地址</a>
                        </dd>
                    </dl>
                </article>
            </div>
        </div>
        <div class="cont-main">
            <div class="main-wrap mt15" style="border: 0px;">
                <ul class="sui-nav nav-tabs" style="margin-top:0px;width: 1000px;margin-left: 30px;">
                    <li style="margin-left: -5px;"><a href="#profile">所有订单</a></li>
                </ul>
                <form action="" id="shop_list">
                    <div style="margin-left: 30px;height: 25px;">
                        <input type="text" placeholder="输入订单号进行搜索 " value="<?=$_GET['keywords']?>" name="keywords" style="width: 200px;height: 25px;font-size: 12px;"/>
                        <button id="search" style="height: 100%;margin-left: -5px;border: 1px #ccc solid;font-size: 12px;color:#353535;background-color: #f2f2f2;width: 100px;">
                            订单搜索
                        </button>
                    </div>
                </form>
                <div class="tab-content"
                     style="width: 1000px;margin-top: 10px;border:1px #fff solid; border-top:transparent;margin-left: 30px;">
                    <div id="index" class="tab-pane " style="padding: 40px 30px;">
                    </div>
                    <div id="profile" class="tab-pane active" style="padding: 00px 00px;">
                        <div style="width: 100%;height: 50px;border: 1px #ccc solid;line-height: 50px;background-color: #fdfdfd">
                            <span style="color: #858585;margin-left: 160px;">宝贝</span>
                            <span style="color: #858585;margin-left: 190px;">单价(元)</span>
                            <span style="color: #858585;margin-left: 29px;">数量</span>
                            <span style="color: #858585;margin-left: 100px;">实付款(元)</span>
                            <span style="color: #858585;margin-left: 45px;">交易状态</span>
                            <span style="color: #858585;margin-left: 45px;">交易操作</span>
                        </div>

                    <?php
                    include "../DB/DBhelper.php";
                    $db=new DBhelper();
                    $userId=$_SESSION['userId'];
                    if ($_GET['keywords']){
                        $keywords=$_GET['keywords'];
                        $con=$db->queryData("select * from orderShopInfo where id=".$keywords);
                    }else{
                        $con=$db->queryData("select * from orderShopInfo");
                    }
                    if (!empty($con)){
                        for ($i=0;$i<count($con);$i++){
                            $shop=$con[$i];
                            $shopId=$shop['shopId'];
                            $shopClassify=$shop['shopClassify'];
                            $shopInfo=$db->queryData("select * from shopInfo where id=".$shopId);
                            $shopimg=$db->queryData("select * from shopImgInfo where shopImgId=".$shopId);
                            $classify=$db->queryData("select * from producttypeInfo where id=".$shopClassify);
                    ?>
                        <div style="margin-top: 30px;width: 100%;height: 150px;border: 1px #ccc solid;">
                            <div style="width: 100%;height: 50px;background-color: #f5f5f5;vertical-align: middle;font-size: 12px;">
                                <span style="line-height: 50px;margin-left: 33px"><?=$shop['datetime']?></span>
                                <span style="line-height: 50px;margin-left: 20px;">订单号：<?=$shop['id']?></span>
                            </div>
                            <div style="float: left;width: 55%;height: 12px;">
                                <div style="width: 100%;">
                                    <img width="100" height="100" src="<?=$shopimg[0]['img']?>"
                                         style="height: 100px;float: left;"/>
                                    <dl style="width: 220px;float: left;margin-left: 20px;margin-top: 20px;">

                                        <div style="font-size: 14px"><?=strlen($shopInfo[0]['shopname'])>15?mb_substr($shopInfo[0]['shopname'],0,15):  $shopInfo[0]['shopname']?></div>
                                        <div style="font-size: 12px;margin-top: 10px"><?=strlen($classify[0]['productType'])>15?mb_substr($classify[0]['productType'],0,15):  $classify[0]['productType']?></div>
                                    </dl>

                                    <dl style="float: left;margin-left: 50px;margin-top: 40px;"><?=$classify[0]['price']?></dl>
                                    <span style="margin-left: 40px;margin-top: 40px;display: inline-block">*<?=$shop['shopNum']?></span>
                                </div>
                            </div>

                            <div style="float: left;border-left: 1px #ccc solid;width: 11%;height:100px;text-align: center;">
                                <span style="font-weight: bold;margin-top: 40px;display: block;"><?=$classify[0]['price']*$shop['shopNum']?></span>
                            </div>
                            <div style="float: left;border-left: 1px #ccc solid;width: 11%;height:100px;text-align: center ;">
                                <dl style="margin-top: 40px;"><?=$shop['shipments']==1?"商家已发货":"商家未发货"?></dl>
                            </div>
                            <div style="float: left;border-left: 1px #ccc solid;width: 11%;height:100px;text-align: center ;">
                                <dl style="margin-top: 30px;">待收货</dl>
                                <button style="color:#fff;background-color: #65b5ff;border: 0px;padding: 4px;margin-top: 5px;margin-top: 5px;">
                                    确认收货
                                </button>
                            </div>
                        </div>
                    <?php
                        }
                    }
                    ?>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
</div>
<div class="clear"></div>
<div class="ng-footer">

			<textarea class="footer-dom" id="footer-dom-02">
			</textarea>
    <div class="ng-fix-bar"></div>
</div>
<style type="text/css">
    .fenye {
        border: 1px #ccc solid;
        padding: 3px;
        width: 20px;
    }

    .ng-footer {
        height: 514px;
        margin-top: 0;
    }

    .ng-s-footer {
        height: 130px;
        background: none;
        text-align: center;
    }

    .ng-s-footer p.ng-url-list {
        height: 25px;
        line-height: 25px;
    }

    .ng-s-footer p.ng-url-list a {
        color: #666666;
    }

    .ng-s-footer p.ng-url-list a:hover {
        color: #f60;
    }

    .ng-s-footer .ng-authentication {
        float: none;
        margin: 0 auto;
        height: 25px;
        width: 990px;
        margin-top: 5px;
    }

    .ng-s-footer p.ng-copyright {
        float: none;
        width: 100%;
    }

    .root1200 .ng-s-footer p.ng-copyright {
        width: 100%;
    }
</style>
<script type="text/javascript" src="js/safe/ms_common.min.js"></script>
</body>

</html>