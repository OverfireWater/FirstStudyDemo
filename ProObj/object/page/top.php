<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>无标题文档</title>
    <style type="text/css">
        <!--
        body {
            margin-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
        }

        .STYLE1 {
            font-size: 12px;
            color: #FFFFFF;
        }

        .STYLE2 {
            font-size: 9px
        }

        .STYLE3 {
            color: #033d61;
            font-size: 12px;
        }

        -->
        a{
            cursor: pointer;
        }
    </style>
    <script>
        function date() {
            var date = new Date();
            var Y = date.getFullYear() + "/";
            var M = date.getMonth() + 1 + "/";
            var D = date.getDate() + " ";
            var h = date.getHours() + ":";
            var week_index = date.getDay();
            var weekday = ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"];
            if (date.getMinutes() < 10) {
                var m = "0" + date.getMinutes() + ":";
            } else {
                var m = date.getMinutes() + ":";
            }
            if (date.getSeconds() < 10) {
                var s = "0" + date.getSeconds();
            } else {
                var s = date.getSeconds();
            }

            document.getElementById('date').textContent = Y + M + D + h + m + s + " " + weekday[week_index];
        }

        setInterval('date()', 1000);
    </script>
    <script src="../JS/jquery-1.8.3.min.js"></script>
    <script>
        $(function (){
            $("#exit").click(function (){
                $.ajax({
                    url:"../Services/SessionOut.php",
                    dataType:"text",
                    success:function (){
                        alert('正在退出账号中')
                        window.top.location.href='login.html';
                    },
                    error:function (){
                        alert('Exe error Data!');
                    }
                });
            });
        });

    </script>
</head>
<?php
session_start();
?>
<body onload="date()">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td height="70" background="../images/main_05.gif">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td height="24">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="270" height="24" background="../images/main_03.gif">&nbsp;</td>
                                <td width="505" background="../images/main_04.gif">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td width="21"><img src="../images/main_07.gif" width="21" height="24"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td height="38">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="270" height="38" background="../images/main_09.gif">&nbsp;</td>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="77%" height="25" valign="bottom">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="50" height="19">
                                                            <div align="center"><a  onclick="window.parent.frames[1].location.reload()"><img src="../images/main_12.gif"
                                                                                     width="49" height="19"></a></div>
                                                        </td>
                                                        <td width="50">
                                                            <div align="center"><a  onclick="window.parent.history.back().location.reload()"><img src="../images/main_14.gif"
                                                                                     width="48" height="19"></a></div>
                                                        </td>
                                                        <td width="50">
                                                            <div align="center"><a  onclick="window.parent.history.forward().location.reload()"><img src="../images/main_16.gif"
                                                                                     width="48" height="19"></a></div>
                                                        </td>
                                                        <td width="50">
                                                            <div align="center"><a  onclick="window.parent.location.reload()"><img src="../images/main_18.gif"
                                                                                     width="48" height="19"></a></div>
                                                        </td>
                                                        <td width="50">
                                                            <div align="center"><a id="exit"><img src="../images/main_20.gif" width="48" height="19"></a id="exit"></div>
                                                        </td>
                                                        <td width="26">
                                                            <div align="center"><img src="../images/main_21.gif"
                                                                                     width="26" height="19"></div>
                                                        </td>
                                                        <td width="100">
                                                            <div align="center"><a href="updateUser.php" target="main"><img src="../images/main_22.gif"
                                                                                     width="98" height="19"></a></div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="220" valign="bottom" nowrap="nowrap">
                                                <div align="right"><span class="STYLE1">
                                                        <span class="STYLE2" id="date"></span></div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td width="21"><img src="../images/main_11.gif" width="21" height="38"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td height="8" style=" line-height:8px;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="270" background="../images/main_29.gif" style=" line-height:8px;">
                                    &nbsp;
                                </td>
                                <td width="505" background="../images/main_30.gif" style=" line-height:8px;">
                                    &nbsp;
                                </td>
                                <td style=" line-height:8px;">&nbsp;</td>
                                <td width="21" style=" line-height:8px;"><img src="../images/main_31.gif" width="21"
                                                                              height="8"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td height="28" background="../images/main_36.gif">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="177" height="28" background="../images/main_32.gif">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="20%" height="22">&nbsp;</td>
                                <td width="59%" valign="bottom">
                                    <div align="center" class="STYLE1"><span
                                                id="username">当前用户为:<?= $_SESSION['username'] ?></span></div>
                                </td>
                                <td width="21%"></td>
                            </tr>
                        </table>
                    </td>
                    <td>&nbsp;</td>
                    <td width="21"><img src="../images/main_37.gif" width="21" height="28"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
