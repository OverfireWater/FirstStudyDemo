<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理中心</title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <?php
    include "../DB/DBhelper.php";
    session_start();
    $DB=new DBhelper();
    $name=$_SESSION['adminname'];
    $pwd=$_SESSION['adminpwd'];
    $id=$_SESSION['adminid'];
    $password_arr=$DB->queryData("select * from adminInfo where username='".$name."' and userpwd='".$pwd."'");
    if ($password_arr==null) {
        echo "<script>alert('账号密码已过期，请重新登录')</script>";
        //如果判断到密码被修改，则使已经在线上的变成线下
        $_SESSION['adminname']=null;
        $_SESSION['adminpwd']=null;
        session_destroy();
        if ($_SESSION['adminname']==null && $_SESSION['adminpwd']==null){
            echo "<script>window.location.href='login.html'</script>>";
        }
    }else{
        $username=$_SESSION['adminname'];
    }
    ?>
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
      <h1><img src="images/y.jpg" class="radius-circle rotate-hover" height="50" alt="" />欢迎 <span style="color: red"><?=$username?></span> 进入后台管理中心</h1>
  </div>
  <div class="head-l">
      <a class="button button-little bg-green" href="javascript:void(0) " onclick="window.top.location.reload()" target="_blank"><span class="icon-home"></span> 首页</a>
      &nbsp;&nbsp;<a class="button button-little bg-red" href="../Session/SessionOut.php"><span class="icon-power-off"></span> 退出登录</a>
  </div>
</div>
<div class="leftnav">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
  <h2><span class="icon-user"></span>文件管理</h2>
  <ul style="display:block">
      <li><a href="fileInfo.php" target="right"><span class="icon-caret-right"></span>文件管理</a></li>
  </ul>   
  <h2><span class="icon-pencil-square-o"></span>用户管理</h2>
  <ul>
      <li><a href="userInfo.php" target="right"><span class="icon-caret-right"></span>会员信息</a></li>
  </ul>
    <h2><span class="icon-pencil-square-o"></span>管理员信息</h2>
    <ul>
        <li><a href="updateAdminPwd.php" target="right"><span class="icon-caret-right"></span>修改密码</a></li>
        <li><a href="addAdmin.php" target="right"><span class="icon-caret-right"></span>添加管理员</a></li>
        <li><a href="adminInfo.php" target="right"><span class="icon-caret-right"></span>管理员信息</a></li>
    </ul>
</div>
<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
	  $(this).next().slideToggle(500);
	  $(this).toggleClass("on"); 
  })
  $(".leftnav ul li a").click(function(){
	    $("#a_leader_txt").text($(this).text());
  		$(".leftnav ul li a").removeClass("on");
		$(this).addClass("on");
  })
});
</script>
<ul class="bread">
  <li><a href="javascript:void(0) " onclick="window.top.location.reload();" target="right" class="icon-home"> 首页</a></li>
  <li><a href="##" id="a_leader_txt">文件管理</a></li>
</ul>
<div class="admin">
  <iframe scrolling="auto" rameborder="0" src="fileInfo.php" name="right" width="100%" height="100%"></iframe>
</div>
</body>
</html>