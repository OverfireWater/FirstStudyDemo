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
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
</head>
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
<?php
include "../Entily/pageInfo.php";
$pageModel = new pageInfo();

if ($_GET['keywords']) {
    $keywords = $_GET['keywords'];
    $arr = $DB->queryData("select count(*) as id from fileInfo where truename like'%".$keywords."%' ");
    $Count = $arr[0]['id'];
    $pageModel->setCount($Count);
    $pageNum = 1;
    $pageModel->setPageNum($pageNum);
    if ($_GET['pageNum']) {
        $pageNum = $_GET['pageNum'];
        $pageModel->setPageNum($pageNum);
    }
    $pageSize = 6;
    $pageModel->setPageSize($pageSize);
    $pageArr = $DB->fileInfo_to_obj("select fileInfo.* ,userInfo.nickname as nickname from fileInfo,userInfo  
where fileInfo.uid=userInfo.id and truename like '%".$keywords."%' limit " . ($pageModel->getPageNum() - 1) * $pageModel->getPageSize() . "," . $pageModel->getPageSize());
}
else{
    $arr = $DB->queryData("select count(*) as id from fileInfo");
    $Count = $arr[0]['id'];
    $pageModel->setCount($Count);
    $pageNum = 1;
    $pageModel->setPageNum($pageNum);
    if ($_GET['pageNum']) {
        $pageNum = $_GET['pageNum'];
        $pageModel->setPageNum($pageNum);
    }
    $pageSize = 6;
    $pageModel->setPageSize($pageSize);
    $pageArr = $DB->fileInfo_to_obj("select fileInfo.* ,userInfo.nickname as nickname from fileInfo,userInfo  
where fileInfo.uid=userInfo.id limit " . ($pageModel->getPageNum() - 1) * $pageModel->getPageSize() . "," . $pageModel->getPageSize());
}

if ($pageArr > 0) {
    $pageModel->setPageData($pageArr);
}
?>
<script>
    $(function (){
        $("#search").click(function (){
            var act="fileInfo.php";
            $("#form_Bulk_search").attr("action",act).attr("method","get").submit();
        });
        $("#delete").click(function (){
            var act="../Services/BulkdeletefileInfo.php";
            $("#form_Bulk_search").attr("action",act).attr("method","post").submit();
        });
    });
</script>
<body>
<form  id="form_Bulk_search">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
    <div class="padding ">
      <ul class="search" style="padding-left:10px;">
        <li style="padding-left: 800px">
                <input type="text" placeholder="请输入搜索关键字" name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />
                <a id="search" href="javascript:void(0)" class="button border-main icon-search" > 搜索</a>
            </form>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
          <th width="70px" style="text-align:left; padding-left:20px;"></th>
        <th >ID</th>
        <th >所属用户</th>
        <th>文件路径</th>
        <th>文件原始名称</th>
        <th>文件大小</th>
        <th>文件类型</th>
        <th >添加时间</th>
        <th >文件状态</th>
        <th >操作</th>
      </tr>
      <volist name="list" id="vo">
          <?php
            $data=$pageModel->getPageData();
            if ($data!=null){
                for ($i=0;$i<count($data);$i++){
                    $pageData=$data[$i];
                    if ($pageData->getFilestatus()=="1"){
                        $Userstatus="正常";
                    }else{
                        $Userstatus="违规";
                    }
                    if ($pageData->getFilesize()!=null){
                        $filesize=$pageData->getFilesize()."kb";
                    }else{
                        $filesize=$pageData->getFilesize();
                    }
          ?>
        <tr>
          <td style="text-align:left; padding-left:20px;"><input type="checkbox" name="file_id[]" value="<?=$pageData->getId()?>" /></td>
          <td><?=$pageData->getId()?></td>
          <td width="10%"><?=$pageData->getNickname()?></td>
          <td><?=strlen($pageData->getFilename())>30?substr($pageData->getFilename(),0,30)."...":$pageData->getFilename()?></td>
<!--            --><?//=strlen($pageData->getAddress())>10?substr($pageData->getAddress(),0,12)."...":  $pageData->getAddress()?>
            <td><?=strlen($pageData->getTruename())>30?substr($pageData->getTruename(),0,30)."...":$pageData->getTruename()?></td>
          <td><?=$filesize?></td>
          <td><?=$pageData->getFiletype()?></td>
          <td><?=$pageData->getAddtime()?></td>
            <td><?=$Userstatus?></td>
          <td><div class="button-group"> <a class="button border-main" href="updateFileInfo.php?id=<?=$pageData->getId()?>"><span class="icon-edit"></span> 修改</a>
                  <a class="button border-red" href="javascript:void(0)" onclick="return del(<?=$pageData->getId()?>)">
                      <span class="icon-trash-o"></span> 删除</a>
              </div>
          </td>
        </tr>

          <?php
            }
        }
          ?>
      <tr>
        <td style="text-align:left; padding:19px 0;padding-left:20px;"><input type="checkbox" id="checkall" onclick="Checked()"/>全选 </td>
        <td colspan="9" style="text-align:left;padding-left:20px;">
            <a id="delete" href="javascript:void(0)" class="button border-red icon-trash-o" style="padding:5px 15px;" > 删除</a>
        </td>
      </tr>
      </volist>
    </table>
  </div>
    <td colspan="10">
        <div class="pagelist">
            <a href="fileInfo.php?<?=$pageModel->getPageNum(1)?>&& keywords=<?=$keywords?>">首页</a>
            <a href="fileInfo.php?pageNum=<?=$pageModel->upPage()?>&& keywords=<?=$keywords?>">上一页</a>
            <span>当前页为第<?=$pageModel->getPageNum()?>页</span>
            <span>总共<?=$pageModel->getDataCount()?>页</span>
            <a href="fileInfo.php?pageNum=<?=$pageModel->nextPage()?>&& keywords=<?=$keywords?>">下一页</a>
            <a href="fileInfo.php?pageNum=<?=$pageModel->getDataCount()?>&& keywords=<?=$keywords?>">尾页</a>
            <input id="Num" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" oninput="if(value<=0)value=1;if(value.length>4)value=value.slice(0,4)" name="textfield" type="number" min="1" step="1" size="10"  />
            <a href="javascript:void(0) "  onclick="goto()">转到</a>
        </div>
    </td>
</form>
<script type="text/javascript">
    function goto(){
        var num=document.getElementById('Num').value;
        var keywords="<?=$keywords?>";
        if (num><?=$pageModel->getDataCount()?>){
            alert("Data cannot be empty");
            document.getElementById('Num').value="";
        }else {
            window.location.href='fileInfo.php?pageNum='+num+'&&keywords='+keywords;
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

    //单个删除
function del(id){
    var flag=confirm("您确定要删除吗?");
    if (flag) {
        window.location.href='../Services/deleteFileServices.php?id='+id;
    }else {

    }
}


</script>
</body>
</html>