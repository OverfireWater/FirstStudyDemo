<!DOCTYPE html>
<html lang="zh-cn">
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
<script>
    function session_super(){
        var admin_super=<?=$_SESSION['super']?>;
        if (admin_super==0) {
            alert('抱歉，你的权限不足！');
            history.back();
        }
    }


</script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="css/pintuer.css">
<link rel="stylesheet" href="css/admin.css">
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <style>
    .radio-checked {
      display: flex;
      align-items: center;
      height: 44px;
    }

    .radio-checked input {
      display: none;
    }

    .radio-checked input + span {
      display: inline-block;
      width: 50px;
      line-height: 45px;
      border-radius: 4px;
      background-color: #dddddd22;
      text-align: center;
      font-size: 14px;
      border: 1px solid #ddd;
    }

    .radio-checked input:checked + span {
      color: #1aa1e4;
      border: 1px solid #1aa1e4;
      background-color: #1aa1e411;
      transition: all 0.5s;
    }

  </style>
  <script>
      function getDate() {
          var date = new Date();
          var Y = date.getFullYear() + "-";
          var M = date.getMonth() + 1 + "-";
          var D = date.getDate() + " ";
          var H = date.getHours() + ":";
          if (date.getMinutes() < 10) {
              var m = "0" + date.getMinutes() + ":";
          } else {
              var m = date.getMinutes() + ":";
          }
          if (date.getSeconds() < 10) {
              var s = "0" + date.getSeconds() ;
          } else {
              var s = date.getSeconds();
          }
          document.getElementById('date').value = Y + M + D + H + m + s;
      }
      setInterval('getDate()',1000);
  </script>

</head>
<body onload="getDate();session_super()">
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加管理员</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="../Services/addAdmin.php">
      <div class="form-group">
        <div class="label">
          <label>管理员名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="name" data-validate="required:请输入管理员名称" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>密码：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="password" value="" data-validate="required:请输入密码" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>确认密码：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="renpassword" value="" data-validate="required:请输入密码" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>联系电话：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="telphone" value="" data-validate="required:请输入联系电话" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>注册时间：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" id="date"  name="date" readonly="readonly"/>
          <div class="tips"></div>
        </div>
      </div>
        <div class="form-group">
            <div class="label">
                <label>是否为超级管理员：</label>
            </div>
          <div class="radio-checked">
              <label for="wu">
                <input name="radio" id="wu" type="radio" value="0" checked="checked">
                <span>否</span>
              </label>
              <label for="you">
                <input name="radio" id="you" type="radio" value="1">
                <span>是</span>
              </label>
          </div>
        </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>

</body></html>