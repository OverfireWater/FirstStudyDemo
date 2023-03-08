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
$id=$_SESSION['id'];
$sql="select * from userInfo where id=".$id;
$arr=$DB->queryData($sql);
$file_path=$arr[0]['userpic'];
$user_nickname=$arr[0]['nickname'];
?>
<?php
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
<script>
    $(function (){
        $("#image1").click(function (){
            $("#file").trigger('click');
        });
    });
</script>
<body>
<div class="panel admin-panel">
    <div class="panel-head"><strong><span class="icon-key"></span> 修改个人信息</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="../Services/updateUserInfoServices.php" enctype="multipart/form-data">
            <div class="form-group">
                <div class="label">
                    <label for="sitename">昵称：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" id="nickname" value="<?=$user_nickname?>" name="nickname" size="50" />
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label for="sitename">头像：</label>
                </div>
                <div class="field">
                    <a href="
                    <?=$file_path?>"><img width="100" height="100" src="<?=$file_path?>"></a>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>更换头像：</label>
                </div>
                <div class="field">
                    <input type="button" class="button bg-blue" id="image1" value="+上传"  style="float:left;" >
                    <input type="file" id="file" name="file"  style="display: none">
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