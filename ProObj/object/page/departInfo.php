<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
<!--
a
{
    text-decoration:none;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.STYLE1 {font-size: 12px}
.STYLE3 {font-size: 12px; font-weight: bold; }
.STYLE4 {
	color: #03515d;
	font-size: 12px;
}
-->
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
    <?php
    include "../DB/DBhelper.php";
    include "../Entily/pageInfo.php";
    $DB=new DBhelper();
    $pageModel=new pageInfo();
    $arr=$DB->queryData("select count(*) as departId from departInfo");
    $Count=$arr[0]['departId'];
    $pageModel->setCount($Count);
    $pageNum=1;
    $pageModel->setPageNum($pageNum);
    if ($_GET['pageNum']){
        $pageNum=$_GET['pageNum'];
        $pageModel->setPageNum($pageNum);
    }
    $pageSize=5;
    $pageModel->setPageSize($pageSize);
    $pageArr=$DB->depart_to_obj("select * from departInfo limit ".($pageModel->getPageNum()-1)*$pageModel->getPageSize().",".$pageModel->getPageSize());
    if ($pageArr>0){
        $pageModel->setPageData($pageArr);
    }
    else{
        echo "<script>alert('没有数据')</script>";
    }
    ?>

<!--    去掉数字框的一些特殊符号和上下选择-->
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }
        input[type="number"]{
            -moz-appearance: textfield;
        }
    </style>
    <script src="../JS/jquery-1.8.3.min.js"></script>
    <script>
//        判断数字框输入的数字是否大于总页数
        function goto(){
            var num=document.getElementById('Num').value;
            if (num><?=$pageModel->getDataCount()?>){
                alert("Data cannot be empty");
                document.getElementById('Num').value="";
            }else {
                window.location.href='departInfo.php?pageNum='+num;
            }

        }
        //全选和取消全选
        var Checked_all=false;
        function Checked(){
            if (Checked_all){
                $("input[type='checkbox']").each(function (){
                    this.checked=false;
                });
                Checked_all=false;
            }else {
                $("input[type='checkbox']").each(function (){
                    this.checked=true;
                });
                Checked_all=true;
            }
        }

        //提交
        function BulkDelete(){
          document.getElementById('departForm').submit();
        }
    </script>
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
</head>
<form action="../Services/BulkdeleteDepart.php" method="post" id="departForm">
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
                <td width="95%" class="STYLE1"><span class="STYLE3">你当前的位置</span>：[部门信息查询]</td>
              </tr>
            </table></td>
            <td width="54%"><table border="0" align="right" cellpadding="0" cellspacing="0">
              <tr>
                <td width="50">&nbsp;</td>
                <td width="55"><table width="87%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="STYLE1"><div align="center">
                        <input type="checkbox" name="checkbox62" value="checkbox" onclick="Checked()" />
                    </div></td>
                    <td class="STYLE1" ><div align="center">全选</div></td>
                  </tr>
                </table></td>
                <td width="54"><table width="90%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="STYLE1"><div align="center"><img src="../images/22.gif" width="14" height="14" /></div></td>
                    <td class="STYLE1" style="cursor:hand" onmouseover="this.style.backgroundImage='url(../images/bg.gif)';this.style.borderStyle='solid';this.style.borderWidth='1';borderColor='#a6d0e7'; "onmouseout="this.style.backgroundImage='url()';this.style.borderStyle='none'"><div align="center"><a href="addDepart.html">新增</a></div></td>
                  </tr>
                </table></td>
                <td width="73"><table width="90%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="STYLE1"><div align="center"><img src="../images/11.gif" width="10" height="14" /></div></td>
                    <td class="STYLE1" style="cursor:hand" onMouseOver="this.style.backgroundImage='url(../images/bg.gif)';this.style.borderStyle='solid';this.style.borderWidth='1';borderColor='#a6d0e7'; "onmouseout="this.style.backgroundImage='url()';this.style.borderStyle='none'"><div align="center" onclick="BulkDelete()"><a href="javascript:void(0)" id="BulkDelete">批量删除</a></div></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="8" background="../tab/images/tab_12.gif">&nbsp;</td>
        <td><table id="depart" width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="b5d6e6" onmouseover="changeto()"  onmouseout="changeback()">
          <tr>
            <td width="3%" height="22" background="../tab/images/bg.gif" bgcolor="#FFFFFF"><div align="center">
              <input type="checkbox" name="checkbox" value="checkbox" onclick="Checked()"/>
            </div></td>
            <td width="3%" height="22" background="../tab/images/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">部门id</span></div></td>
            <td width="12%" height="22" background="../tab/images/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">部门名称</span></div></td>
            <td width="14%" height="22" background="../tab/images/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">备注</span></div></td>
            <td width="15%" height="22" background="../tab/images/bg.gif" bgcolor="#FFFFFF" class="STYLE1"><div align="center">基本操作</div></td>
          </tr>

            <?php
                $data=$pageModel->getPageData();
                if ($data>0){
                for ($i=0;$i<count($data);$i++){
                    $pageData=$data[$i];
            ?>
                    <tr id="depart">
                        <td height="20" bgcolor="#FFFFFF">
                            <div align="center">
                                <input type="checkbox" name="departId[]" value="<?=$pageData->getDepartId()?>"/>
                            </div>
                        </td>
                        <td height="20" bgcolor="#FFFFFF">
                            <div align="center" class="STYLE1">
                                <div align="center"><?=$pageData->getDepartId()?></div>
                            </div>
                        </td>
                        <td bgcolor="#FFFFFF"><div align="center"><span class="STYLE1"><?=$pageData->getDepartName()?></span></div></td>
                        <td height="20" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1"><?=$pageData->getDepartMark()?></span></div></td>
                        <td height="20" bgcolor="#FFFFFF" ><div align="center"><span class="STYLE4" ><img src="../tab/images/edt.gif" width="16" height="16" /><a href="updateDepart.php?departId=<?=$pageData->getDepartId()?>">编辑</a>&nbsp; &nbsp;<img src="../tab/images/del.gif" width="16" height="16" /><a href="../Services/deleteDepart.php?departId=<?=$pageData->getDepartId()?>">删除</a></span></div></td>
                    </tr>
                <?php
                    }
                }
                ?>
                </form>
        </table></td>
        <td width="8" background="../tab/images/tab_15.gif">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="35" background="../tab/images/tab_19.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="12" height="35"><img src="../tab/images/tab_18.gif" width="12" height="35" /></td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="STYLE4">&nbsp;&nbsp;共有<?=$pageModel->getCount()?>条记录，当前第 <?=$pageModel->getPageNum()?>/<?=$pageModel->getDataCount()?> 页</td>
            <td><table border="0" align="right" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="40"><a href="departInfo.php?<?=$pageModel->getPageNum(1)?>"><img src="../tab/images/first.gif" width="37" height="15" /></a></td>
                  <td width="45"><a href="departInfo.php?pageNum=<?=$pageModel->upPage()?>"><img src="../tab/images/back.gif" width="43" height="15" /></a></td>
                  <td width="45"><a href="departInfo.php?pageNum=<?=$pageModel->nextPage()?>"><img src="../tab/images/next.gif" width="43" height="15" /></a></td>
                  <td width="40"><a href="departInfo.php?pageNum=<?=$pageModel->getDataCount()?>"><img src="../tab/images/last.gif" width="37" height="15" /></a></td>
                  <td width="100"><div align="center"><span class="STYLE1">转到第
                    <input onkeyup="this.value=this.value.replace(/\D/g,'',0)" onafterpaste="this.value=this.value.replace(/\D/g,'',0)" name="textfield" id="Num" type="number" min="0" step="1" size="10" style="height:12px; width:30px; border:1px solid #999999;" />
                    页 </span></div></td>
                  <td width="40"><img src="../tab/images/go.gif" width="37" height="15" onclick="goto()" /></td>
                </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="16"><img src="../tab/images/tab_20.gif" width="16" height="35" /></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>









