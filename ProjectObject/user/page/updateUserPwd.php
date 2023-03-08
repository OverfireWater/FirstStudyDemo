<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title></title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/pintuer.js"></script>
</head>
<?php
include "../DB/DBhelper.php";
session_start();
$DB=new DBhelper();
$name=$_SESSION['username'];
$pwd=$_SESSION['userpwd'];
$id=$_SESSION['id'];
$status=0;
$password_arr=$DB->queryData("select * from userInfo where username='".$name."' and userpwd='".$pwd."'");
$user_pic=$password_arr[0]['userpic'];
$user_nickname=$password_arr[0]['nickname'];
if ($password_arr==null) {
    echo "<script>alert('账号密码已过期，请重新登录')</script>";
    $_SESSION['username']=null;
    $_SESSION['userpwd']=null;
    session_destroy();
    echo "<script>window.location.href='login.php'</script>>";
}
?>
<body>
<div class="panel admin-panel">
    <div class="panel-head"><strong><span class="icon-key"></span> 修改会员密码</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="../Services/updateUserPwdServices.php">
            <div class="form-group">
                <div class="label">
                    <label for="sitename">账号：</label>
                </div>
                <div class="field">
                    <label style="line-height:33px;">
                        <?=$_SESSION['username']?>
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label for="sitename">原始密码：</label>
                </div>
                <div class="field">
                    <input type="password" class="input w50" id="mpass" name="mpass" size="50" placeholder="请输入原始密码" data-validate="required:请输入原始密码" />
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label for="sitename">新密码：</label>
                </div>
                <div class="field">
                    <input type="password" class="input w50" name="newpass" size="50" placeholder="请输入新密码" data-validate="required:请输入新密码,length#>=5:新密码不能小于5位" />
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label for="sitename">确认新密码：</label>
                </div>
                <div class="field">
                    <input type="password" class="input w50" name="renewpass" size="50" placeholder="请再次输入新密码" data-validate="required:请再次输入新密码,repeat#newpass:两次输入的密码不一致" />
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