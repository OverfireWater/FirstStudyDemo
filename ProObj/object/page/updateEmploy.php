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
    </style>
    <script src="../JS/jquery-1.8.3.min.js"></script>
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

    <?php
    include "../DB/DBhelper.php";
    $DB=new DBhelper();
    if ($_GET['employId']){
        $employId=$_GET['employId'];
    }
    $arr=$DB->employee_to_obj("select * from employee where employeeId=".$employId);
    if (count($arr)>0){
        $employ_obj=$arr[0];
    }
    $depart_arr=$DB->depart_to_obj("select * from departInfo where departId=".$employ_obj->getDepartId());
    if (count($depart_arr)>0){
        $depart_obj=$depart_arr[0];
    }
    ?>
    <script type="text/javascript">
        $(function (){
            $.ajax({
                type:"post",
                async:"true",
                url:"../Services/departName.php",
                dataType:"json",
                success:function (data){
                    $.each(data.result,function (index,obj){
                        $("#depart").append("<option value='"+obj['departId']+"'>"+obj['departName']+"</option>");
                    });
                },
                error:function (){
                    alert('数据错误');
                }
            });
        });
        function Sex(){
                var sex="<?=$employ_obj->getSex()?>";
                if (sex=="女"){
                    $("[name='sex'][value='男']").removeAttr('checked');
                    $("[name='sex'][value='女']").prop("checked", "checked");
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
<body onload="Sex()">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td height="30" background="../tab/images/tab_05.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="46%" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="5%"><div align="center"><img src="../tab/images/tb.gif" width="16" height="16" /></div></td>
                                            <td width="95%" class="STYLE1"><span class="STYLE3">你当前的位置</span>：[修改员工信息]</td>
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

    <!--    form 表单-->
    <form action="../Services/addEmployServices.php" method="post" enctype="multipart/form-data">
        <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="10" height="0" background="../tab/images/tab_12.gif">&nbsp;</td>
                        <td width="1233"><table width="44%" height="377" border="0" cellpadding="0" cellspacing="1" bgcolor="b5d6e6" >
                                <tr>
                                    <td width="129" height="20" bgcolor="#FFFFFF" class="STYLE2"><div align="left">
                                            编&nbsp;&nbsp;&nbsp;&nbsp;号：
                                        </div></td>
                                    <td width="321" height="20" bgcolor="#FFFFFF">
                                        <div align="left">
                                            <input   type="text" id="ID" name="ID" readonly="readonly" value="<?=$employId?>"/>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="129" height="20" bgcolor="#FFFFFF" class="STYLE2"><div align="left">
                                            姓&nbsp;&nbsp;&nbsp;&nbsp;名：
                                        </div></td>
                                    <td width="321" height="20" bgcolor="#FFFFFF">
                                        <div align="left">
                                            <input   type="text" id="name" name="name" value="<?=$employ_obj->getName()?>"/>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="129" height="20" bgcolor="#FFFFFF"><div align="left">
                                            年&nbsp;&nbsp;&nbsp;&nbsp;龄：
                                        </div></td>
                                    <td width="321" height="20" bgcolor="#FFFFFF">
                                        <div align="left">
                                            <input   type="text" id="age" name="age" value="<?=$employ_obj->getAge()?>"/>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="129" height="20" bgcolor="#FFFFFF"><div align="left">
                                            性&nbsp;&nbsp;&nbsp;&nbsp;别：
                                        </div></td>
                                    <td width="321" height="20" bgcolor="#FFFFFF">
                                        <div align="left">
                                            <input   type="radio" id="sex" name="sex" checked="checked" value="男"/>男
                                            <input   type="radio" id="sex" name="sex"  value="女"/>女
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="129" height="20" bgcolor="#FFFFFF"><div align="left">
                                            部&nbsp;&nbsp;&nbsp;&nbsp;门：
                                        </div></td>
                                    <td width="321" height="20" bgcolor="#FFFFFF">
                                        <div align="left">
                                            <select id="depart" name="depart">
                                                <option value="0"><?=$depart_obj->getDepartName()?></option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="129" height="20" bgcolor="#FFFFFF"><div align="left">
                                            家庭地址：
                                        </div></td>
                                    <td width="321" height="20" bgcolor="#FFFFFF">
                                        <div align="left">
                                            <input   type="text" id="address" name="address" value="<?=$employ_obj->getAddress()?>"/>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="129" height="20" bgcolor="#FFFFFF"><div align="left">
                                            电&nbsp;&nbsp;&nbsp;&nbsp;话：
                                        </div></td>
                                    <td width="321" height="20" bgcolor="#FFFFFF">
                                        <div align="left">
                                            <input   type="text" id="telphone" name="telphone" value="<?=$employ_obj->getTelphone()?>"/>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="129" height="20" bgcolor="#FFFFFF"><div align="left">
                                            学&nbsp;&nbsp;&nbsp;&nbsp;历：
                                        </div></td>
                                    <td width="321" height="20" bgcolor="#FFFFFF">
                                        <div align="left">
                                            <select id="xueli" name="xueli">
                                                <option value="0"><?=$employ_obj->getXueli()?></option>
                                                <option>专科</option>
                                                <option>本科</option>
                                                <option>硕士研究生</option>
                                                <option>博士研究生</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="129" height="20" bgcolor="#FFFFFF"><div align="left">
                                            备&nbsp;&nbsp;&nbsp;&nbsp;注：
                                        </div></td>
                                    <td width="321" height="20" bgcolor="#FFFFFF">
                                        <div align="left">
                                            <textarea rows="10" cols="20" id="remark" name="remark"><?=$employ_obj->getMark()?></textarea>
                                        </div>
                                    </td>
                                </tr>

                                <!--            上传图片-->
                                            <tr>
                                                <td width="129" height="20" bgcolor="#FFFFFF"><div align="left">
                                                   员工照片：
                                                </div></td>
                                                <td width="321" height="20" bgcolor="#FFFFFF">
                                                    <div align="left">
                                                        <img width="100" height="100" src="<?=$employ_obj->getEmpImg()?>" alt=""/>
                                                        <input   type="file" id="file" name="file"/>
                                                    </div>
                                                </td>
                                            </tr>
                                <tr>
                                    <td height="20" bgcolor="#FFFFFF" colspan="2" align="center">
                                        <input  type="submit" id="submit" value="提交" />&nbsp;&nbsp;
                                    </td>
                                </tr>
                            </table>

                        </td>

                    </tr>
                </table></td>
        </tr>
    </form>
    <tr>
        <td height="35" background="../tab/images/tab_19.gif">&nbsp;</td>
    </tr>

</table>
</body>
</html>
