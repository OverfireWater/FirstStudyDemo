
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include "../DB/DBhelper.php";
session_start();
$DB=new DBhelper();
$id=$_SESSION['userId'];
$name=$_SESSION['username'];
$pwd=$_SESSION['userpwd'];
$password_arr=$DB->queryData("select * from userInfo where userName='".$name."' and userPwd='".$pwd."'and userId=".$id);
if ($password_arr==null) {
    echo "<script>alert('账号或密码已被修改，正在注销中！！')</script>";
    $_SESSION['username']=null;
    $_SESSION['userpwd']=null;
    session_destroy();
    if ($_SESSION['username']==null and $_SESSION['userpwd']==null){
        echo "<script>window.top.location.href='login.html'</script>>";
    }
}else{
    $username=$_SESSION['username'];
}


//if ($_SESSION['username']==null and $_SESSION['userpwd']==null){
//    echo "<script>window.location.href='login.html'</script>>";
//}
//else{
//    $username=$_SESSION['username'];
//}
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>企业信息管理系统</title>
</head>

<frameset rows="98,*,8" frameborder="no" border="0" framespacing="0">
    <frame src="top.php" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" />
    <frame src="center.html" name="mainFrame" id="mainFrame" />
    <frame src="down.html" name="bottomFrame" scrolling="No" noresize="noresize" id="bottomFrame" />
</frameset>
<noframes><body>
    </body>
</noframes></html>
