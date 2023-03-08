<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<script type="text/javascript" src="js/safe/aywmq_qt.js" ></script>
		<script type="text/javascript" src="js/safe/da_opt.js" ></script>
		<meta name="keywords" content="">
		<meta name="description" content="">
		<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<link rel="stylesheet" href="css/safe/css.css" />
		<link rel="stylesheet" href="css/safe/common.min.css" />
		<link rel="stylesheet" href="css/safe/ms-style.min.css" />
		<link rel="stylesheet" href="css/safe/personal_member.min.css" />
		<link rel="stylesheet" href="css/safe/Snaddress.min.css" />
		<link rel="stylesheet" href="css/zpwd/sui.css" />
        <link rel="stylesheet" href="../page/layui/css">
        <script src="../page/layui/layui.js"></script>
		<script type="text/javascript" src="js/sui.js" ></script>
	</head>
	<style>
		a{
			color: #000000;
		}
		.sui-table th, .sui-table td {
    padding: 6px 8px;
    line-height: 18px;
    text-align: left;
    vertical-align: middle;
    border-top: 1px solid #e6e6e6;
    font-size: 14px;
    color: #333333;
}
	</style>
    <?php
    session_start();
    ?>
	<body class="ms-body">
		<div id= class="ng-top-banner"></div>
		<div class="ng-toolbar">
			<div class="ng-toolbar-con wrapper">
				<div class="ng-toolbar-left">
					<a class="ng-bar-node ng-bar-node-backhome" id="ng-bar-node-backhome" style="display: block;">
						<a href="../page/index.php"><img src="img/Home.png" style="margin-right: 10px;" alt=""/>返回商城首页</a>
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
					.titles{
						font-size: 12px;
						color: #333333;
						/*font-weight: bold;*/
					}
					h3 {
					    margin: 0px 0;
					    font-weight: bold;
					    font-size: 14px;
					    line-height: 18px;
					    color: inherit;
					    text-rendering: optimizelegibility;
					}
				</style>
				<script>
					$(function () {

						$('#exit_login').click(function () {
							$('#block_login').toggle(500);
						});
					});
				</script>
				<div class="header-menu">
					<div class="ms-logo">
						<a class="ms-head-logo"  name="Myyigou_index_none_daohangLogo"><span style="font-size: 30px;color: #fff;font-weight: bold;    line-height: 28px;;">我的</span></a>
						
					</div>
					<nav class="ms-nav">
						<ul>
							<a href="orderInfo.php" data-url="" ><li class="">首页<i class="nav-arrow"></i></li></a>
							<li class="nav-manage selected">
								<span >账户管理<em></em></span><i class="nav-arrow"></i>
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
						</div>
						<a >sunshine</a>
					</div>

					<div class="ms-name-info">
						<div class="link-myinfo">
							<a >我的编号:99653</a>
						</div>
						<div class="info-member">
        				 <span style="margin-left: 20px;">
        				 <a href="UdInformation.php" target="_blank" >我的资料</a></span>
						</div>
					</div>
				</div>

			</article>
		</header>
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
									<a href="orderInfo.php" >我的订单</a>
								</dd>
								<dt><img src="img/左侧/我的买啦.png" style="margin-right: 10px;margin-left: -20px;"/>个人中心</dt>
								<dd>
									<a href="UdInformation.php">资料修改</a>
								</dd>
								<dd>
									<a href="address.php" style="color:#f70">管理地址</a>
								</dd>
							</dl>
						</article>
					</div>
                    <?php
                    include "../DB/DBhelper.php";
                    $db=new DBhelper();
                    $userId=$_SESSION['userId'];
                    $address_count=$db->queryData("select count(*) as id from shopaddress where userId=".$userId);
                    $count=$address_count[0]['id'];
                    if ($count==0){
                        $a="block";
                    }else{
                        $a="none";
                    }
                    ?>
				</div>
                <form method="post" action="../Udservices/addShopaddress.php" id="address_form">
				<div class="cont-main" style="display: <?=$a?>">
					<div class="main-wrap mt15">
						<h3>
	                        <strong style=" font-size: 14px;">收货地址</strong>
	                    </h3>
						<div class="user-profile clearfix" style="margin-left: 0;width: 100%;border: 0;">
							<div class="user-profile-wrap" style="width: 100%;height: 233px;">
								<p style="margin-left: 70px;font-size: 14px;"><span style="color:#F88600;font-size: 14px;">新增收货地址</span> </p>
							<div style="margin-left: 70px;margin-top: 50px;">
								&nbsp;&nbsp;&nbsp;<span style="color: #F2873B;">*&nbsp;</span><span class="titles">详细地址:</span>
							</div>
							<div style="margin-left: 150px;margin-top:-40px;">
                                &nbsp;&nbsp;<textarea style="width:500px;height: 90px;padding: 5px;" id="address" name="address" placeholder="建议您如实填写详细收货地址，例如街道 名称，门牌号码，楼层和房间号等信息"></textarea>
							</div>

							<div style="margin-left: 80px;margin-top: 20px;">
                                <span style="color: #F2873B;">*&nbsp;</span><span class="titles">收货姓名:</span>
								<input type="text" name="name" id="name" placeholder="收货人姓名" style="padding: 5px;width: 300px;margin-left: 14px;" />
							</div>
							<div style="margin-left: 80px;margin-top: 30px;">
                                <span style="color: #F2873B;">*&nbsp;</span><span class="titles">手机号码:</span>
								<input type="text" name="phone" id="phone" placeholder="电话号码" style="padding: 5px;width: 300px;margin-left: 14px;" />
							</div>
							
							<button type="button" id="address_but" style="margin-left:150px;margin-top:10px;background-color:#F37B1D ;color: #fff;width: 100px;height: 30px;border: 0px;border-radius: 5px;">保存</button>
							</div>
							
						</div>
					</div>
				</div>
                </form>
							<!--
                            	作者：admin
                            	时间：2016-05-05
                            	描述：
                            -->
							<div style="margin-top: 30px;width: 1068px; margin: 15px 0 30px 170px;">
								<table class="sui-table table-bordered-simple" style="margin-top: 20px;">
								  <thead>
								    <tr>
								      <th>收货人</th>
								      <th>收货地址</th>
								      <th>电话/手机</th>
								      <th>操作</th>
								      <th></th>
								    </tr>
								  </thead>
                                    <?php

                                    $con=$db->queryData("select * from shopaddress where userId=".$userId);
                                    $con=$con[0];
                                    if (!empty($con)){
                                    ?>
								  <tbody>
								    <tr>
								      <td><?=$con['consignee']?></td>
								      <td><?=$con['address']?></td>
								      <td><?=$con['tel']?></td>
								      <td style="color: #007AFF;"><span style="cursor: pointer;color: black" id="de_address" >删除</span></td>
								      <td ><span style="padding: 2px;font-size: 10px;color: #EC5937;border-radius:5px;background-color: #fad5d0;border: 1px #C85E0B solid;">默认地址</span></td>
								    </tr>
								  </tbody>
                                    <?php
                                    }
                                    ?>
								</table>
								
							</div>
				<script>
                    $(function (){
                        $("#address_but").click(function (){
                            var address=$("#address").val();
                            var name=$("#name").val();
                            var phone=$("#phone").val();
                            if (address=="" || name==""||phone=="" || phone.length!=11){
                                layer.msg('请将信息添加完整！',{icon:0});
                            }else {
                                $("#address_form").submit();
                            }
                        });
                        $("#de_address").click(function (){
                            layer.confirm('确定要删除此地址吗？',function (){
                                $.ajax({
                                    type:"get",
                                    url:"../Udservices/DeAddress.php",
                                    data:{"userId":<?=$userId?>},
                                    dataType:"text",
                                    success:function (re){
                                        if (re=="success"){
                                            window.location.reload();
                                        }
                                    }
                                });
                            });
                        });
                    });
                </script>
				
			</div>
		</div>
		<div class="clear"></div>
		<div class="ng-footer">
			<textarea class="footer-dom" id="footer-dom-02">
			</textarea>
			<div class="ng-fix-bar"></div>
		</div>
		<style type="text/css">
			.sui-table td 
			{
				font-size: 14px;
			}
			.sui-table td 
			{
				font-size: 12px;
			}
			.ng-footer {
				height: 130px;
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
		<script type="text/javascript" src="js/safe/ms_common.min.js" ></script>
	</body>

</html>