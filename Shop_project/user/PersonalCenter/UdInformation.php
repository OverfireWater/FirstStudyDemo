<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<script type="text/javascript" src="js/safe/aywmq_qt.js" ></script>
		<meta name="keywords" content="">
		<meta name="description" content="">
		<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<link rel="stylesheet" href="css/safe/css.css" />
		<link rel="stylesheet" href="css/safe/common.min.css" />
		<link rel="stylesheet" href="css/safe/ms-style.min.css" />
		<link rel="stylesheet" href="css/safe/personal_member.min.css" />
		<link rel="stylesheet" href="css/safe/Snaddress.min.css" />
		<link rel="stylesheet" href="css/sui.css">
		<script type="text/javascript" src="js/sui.js" ></script>
	</head>
    <?php
    session_start();
    ?>
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
							<a href="UdInformation.php" class="ng-vip-union" target="_blank" rel="nofollow">账号管理</a>
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
						font-size: 14px;
						color: #333333;
					}
					
				</style>
				<script>
					$(function () {

						$('#exit_login').click(function () {
							$('#block_login').toggle(500);
						});$('#avatar').click(function () {
							$('#avatar_file').trigger('click');
						});
					});
					function choose_file_block(){
						if ($('#avatar_file').val()){
							var files=document.getElementById('avatar_file').files[0];
							var url=window.URL.createObjectURL(files);
							$('#choose_img').attr('src',url);
						}else {
							$('#choose_img').attr('src',"");
						}
					}
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
						<a  style="color: black">sunshine</a>
					</div>

					<div class="ms-name-info">
						<div class="link-myinfo">
							<a style="color: black">我的编号:99653</a>
						</div>
						<div class="info-member">
        				 <span style="margin-left: 20px;">
        				 <a href="UdInformation.php" style="color: black">我的资料</a></span>
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
								<dt><a href="../page/index.php"><img src="img/左侧/我的购物车.png" style="margin-right: 10px;margin-left: -20px;"/>我的购物车</a></dt>
								<dt><img src="img/左侧/file.png" style="margin-right: 10px;margin-left: -20px;"/>订单管理</dt>
								<dd>
									<a href="orderInfo.php">我的订单</a>
								</dd>
								<dt><img src="img/左侧/我的买啦.png" style="margin-right: 10px;margin-left: -20px;"/>个人中心</dt>
								<dd>
									<a href="UdInformation.php" style="color:#f70">资料修改</a>
								</dd>
								<dd>
									<a href="address.php">管理地址</a>
								</dd>
							</dl>
						</article>
					</div>
				</div>
                <?php
                include "../DB/DBhelper.php";
                $db=new DBhelper();
                $userId=$_SESSION['userId'];
                $con=$db->queryData("select * from userInfo where id=".$userId);
                if (!empty($con)){
                    $con=$con[0];
                }
                ?>
                <form id="form" enctype="multipart/form-data" method="post">
				<div class="cont-main">
					<div class="main-wrap mt15">
						<h3>
	                        <strong>个人信息</strong>
	                    </h3>
						<div class="user-profile clearfix">
							<div class="user-profile-wrap">
								<div class="profile-avatar">
									<img src="img/头像.png" id="choose_img" height="120" width="120">
									<a id="avatar" style="cursor: pointer">编辑头像</a>
									<input type="file" id="avatar_file" name="file" accept="image/jpeg,image/png" onchange="choose_file_block()" style="display: none">
									<div class="edit_bg"></div>
								</div>
							</div>
							<div class="profile-info">
								<div class="control-group clearfix ">
									<div class="controls lh26">
										<label class="control-label"><span style="margin-left: 10px;">用户名:</span>
											<input  style="margin-left: 10px;" name="username" value="<?=$con['username']?>" type="text" class="text">
                                            <br>
                                        <label class="control-label" style="padding-top: 10px"><span style="margin-left: 10px;">密&nbsp;&nbsp;&nbsp;&nbsp;码:</span>
											<input  style="margin-left: 10px;" name="userpwd" value="" type="password" class="text">
									</div>
								</div>
							</div>
						</div>
						<div class="form-list tab-switch personal-wrap-show">

								<div class="control-group clearfix">
									<label class="control-label">手机：</label>
									<div class="controls lh26">
                                        <input type="text" name="phone" value="<?=$con['userphone']?>" class="text">
									</div>
								</div>
                                <div class="control-group clearfix">
                                    <label class="control-label"><em>*&nbsp;</em>性别：</label>
                                    <div id="gender" class="controls">
                                        <label class="sex-label">
                                            <input type="radio" value="nan" name="sex" checked="checked">
                                            <span>男</span>
                                        </label>
                                        <label class="sex-label">
                                            <input type="radio" name="sex" value="nv" >
                                            <span>女</span>
                                        </label>
                                    </div>
                                </div>

								<div class="control-group clearfix priority-low">
									<label class="control-label">&nbsp;</label>
									<div style="float:left;">
										<button style="border: none;outline: none" type="button" id="user_but" class="ms-stand-btn1" >保 存</button>
									</div>
									<div id="" class="error-place"></div>
									<div class="error-place mt29"></div>
								</div>

						</div>
					</div>
				</div>
        </form>
				
			</div>
		</div>
        <script>
            $(function (){
                var sex='<?=$con['sex']?>';
                if (sex=='nv'){
                    $("[name='sex'][value='nan']").removeAttr('checked');
                    $("[name='sex'][value='nv']").prop("checked", "checked");
                }
                $('#user_but').click(function (){
                    var files_data=new FormData($('#form')[0]);
                    // files_data.append('files','122121');
                    // console.log(files_data);
                    $.ajax({
                        type:"post",
                        url:"../UdServices/UduserInfoService.php",
                        data:files_data,
                        dataType:"text",
                        processData: false, // 告诉jQuery不要去处理发送的数据
                        contentType: false, // 告诉jQuery不要去设置Content-Type请求头
                        success:function (result){
                            alert(result);
                            // if (result=="repeat_file") {
                            //     layer.msg('已有该图片!!', {icon: 0});
                            // }
                            // if (result=="error"){
                            //     layer.msg('图片上传失败，请重新上传!!',{icon: 0});
                            // }
                            // if (result=="success"){
                            //     layer.msg('修改成功!!', {icon: 1});
                            // }
                        }
                    });
                });
            });
        </script>
		<style type="text/css">
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
	</body>

</html>