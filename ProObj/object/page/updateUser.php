<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <style type="text/css">
        <!--
        body {
            margin-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            color:#000000;
            font-size:14px;
        }
        .STYLE1 {font-size: 12px}
        .STYLE3 {font-size: 12px; font-weight: bold; }
        .STYLE4 {
            color: #03515d;
            font-size: 12px;
        }
        input
        {
        }
        -->
        a{
            cursor: pointer;
        }

    </style>

    <script>
        var  highlightcolor='#c1ebff';
        //此处clickcolor只能用win系统颜色代码才能成功,如果用#xxxxxx的代码就不行,还没搞清楚为什么:(
        var  clickcolor='#51b2f6';
        function  changeto(){
            source=event.srcElement;
            if  (source.tagName=="TR"||source.tagName=="TABLE")
                return;
            while(source.tagName!="TD")
                source=source.parentElement;
            source=source.parentElement;
            cs  =  source.children;
//alert(cs.length);
            if  (cs[1].style.backgroundColor!=highlightcolor&&source.id!="nc"&&cs[1].style.backgroundColor!=clickcolor)
                for(i=0;i<cs.length;i++){
                    cs[i].style.backgroundColor=highlightcolor;
                }
        }

        function  changeback(){
            if  (event.fromElement.contains(event.toElement)||source.contains(event.toElement)||source.id=="nc")
                return
            if  (event.toElement!=source&&cs[1].style.backgroundColor!=clickcolor)
//source.style.backgroundColor=originalcolor
                for(i=0;i<cs.length;i++){
                    cs[i].style.backgroundColor="";
                }
        }

        function  clickto(){
            source=event.srcElement;
            if  (source.tagName=="TR"||source.tagName=="TABLE")
                return;
            while(source.tagName!="TD")
                source=source.parentElement;
            source=source.parentElement;
            cs  =  source.children;
//alert(cs.length);
            if  (cs[1].style.backgroundColor!=clickcolor&&source.id!="nc")
                for(i=0;i<cs.length;i++){
                    cs[i].style.backgroundColor=clickcolor;
                }
            else
                for(i=0;i<cs.length;i++){
                    cs[i].style.backgroundColor="";
                }
        }
    </script>
    <script type="text/javascript">
        function changPwd(){
            var dem_input=document.getElementById('password');
            if (dem_input.type == "password") {
                dem_input.type = "text";
            }else {
                dem_input.type = "password";
            }
        }
    </script>

</head>
<?php
session_start();
$username=null;
$userpwd=null;
if ($_SESSION['username']==null and $_SESSION['userpwd']==null){
    echo "<script>window.location.href='login.html'</script>>";
}
else{
    $username=$_SESSION['username'];
}
?>
<?php
//session_start();
//$username=null;
//$userpwd=null;
//if ($_SESSION['username']==null and $_SESSION['userpwd']==null){
//    echo "<script>window.location.href='login.html'</script>>";
//}
//else{
//    $username=$_SESSION['username'];
//}
//?>
<?php
include "../DB/DBhelper.php";
session_start();
$DB=new DBhelper();
$userId=$_SESSION['userId'];
$sql="select * from userInfo where userID=".$userId;
$arr=$DB->queryData($sql);
if (count($arr)>0){
    $userName=$arr[0]['userName'];
    $userPwd=$arr[0]['userPwd'];
}
?>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td height="30" background="../tab/images/tab_05.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="46%" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="5%"><div align="center"><img src="../tab/images/tb.gif" width="16" height="16" /></div></td>
                                            <td width="95%" class="STYLE1"><span class="STYLE3">你当前的位置</span>：[修改用户信息]</td>
                                        </tr>
                                    </table></td>
                                <td width="54%"><table border="0" align="right" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td width="50">&nbsp;</td>
                                            <td width="55"><table width="87%" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td class="STYLE1"><div align="center"></div></td>
                                                        <td class="STYLE1" >&nbsp;</td>
                                                    </tr>
                                                </table></td>
                                            <td width="54"><table width="90%" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td class="STYLE1"><div align="center"></div></td>
                                                        <td class="STYLE1" style="cursor:hand" onmouseover="this.style.backgroundImage='url(../tab/images/bg.gif)';this.style.borderStyle='solid';this.style.borderWidth='1';borderColor='#a6d0e7'; "onmouseout="this.style.backgroundImage='url()';this.style.borderStyle='none'"><div align="center"></div></td>
                                                    </tr>
                                                </table></td>
                                            <td width="73"><table width="90%" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td class="STYLE1">&nbsp;</td>
                                                        <td class="STYLE1" style="cursor:hand" onMouseOver="this.style.backgroundImage='url(../tab/images/bg.gif)';this.style.borderStyle='solid';this.style.borderWidth='1';borderColor='#a6d0e7'; "onmouseout="this.style.backgroundImage='url()';this.style.borderStyle='none'"><div align="center"></div></td>
                                                    </tr>
                                                </table></td>
                                        </tr>
                                    </table></td>
                            </tr>
                        </table></td>
                </tr>
            </table></td>
    </tr>


    <form action="../Services/updateUserInfo.php" method="post">
        <tr>
            <td><table width="50%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="10" height="0" background="../tab/images/tab_12.gif">&nbsp;</td>
                        <td width="1233"><table width="100%" height="75" border="0" cellpadding="0" cellspacing="1" bgcolor="b5d6e6" >
                                <tr>
                                    <td width="80" height="25" bgcolor="#FFFFFF" class="STYLE2"><div align="left">
                                            用户ID：
                                        </div></td>
                                    <td width="241" height="25" bgcolor="#FFFFFF">
                                        <div align="left">
                                            <input   type="text" name="id" readonly="readonly" value="<?=$_SESSION['userId']?>"/>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="80" height="25" bgcolor="#FFFFFF" class="STYLE2"><div align="left">
                                            用户名称：
                                        </div></td>
                                    <td width="241" height="25" bgcolor="#FFFFFF">
                                        <div align="left">
                                            <input   type="text" name="name" value="<?=$userName?>"/>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="80" height="25" bgcolor="#FFFFFF" class="STYLE2"><div align="left">
                                            用户密码：
                                        </div></td>
                                    <td width="241" height="25" bgcolor="#FFFFFF">
                                        <div align="left">
                                            <input   type="password" id="password" name="password" value="<?=$userPwd?>" />
                                            <a><span id="pwd" onclick="changPwd()">显示密码</span></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="20" bgcolor="#FFFFFF" colspan="2" align="center" style="padding-right: 150px">
                                        <input  type="submit" value="提交"/>&nbsp;

                                    </td>
                                </tr>
                            </table>

                        </td>

                    </tr>
                </table>
    </form>
</table></td>
</tr>

<tr>
    <td height="35" background="../tab/images/tab_19.gif">&nbsp;</td>
</tr>
</table>
</body>
</html>
