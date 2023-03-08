<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
    <link rel="stylesheet" href="../css/pintuer.css">
    <link rel="stylesheet" href="../css/admin.css">
<script src="../js/jquery.js"></script>
<script src="../js/pintuer.js"></script>
</head>
<?php
include "../DB/DBhelper.php";
include "../Entily/pageInfo.php";
session_start();
$DB = new DBhelper();
$pageModel = new pageInfo();
$arr = $DB->queryData("select count(*) as id from adminfileInfo");
$Count = $arr[0]['id'];
$pageModel->setCount($Count);
$pageNum = 1;
$pageModel->setPageNum($pageNum);
if ($_GET['pageNum']) {
    $pageNum = $_GET['pageNum'];
    $pageModel->setPageNum($pageNum);
}
$pageSize = 4;
$pageModel->setPageSize($pageSize);
if ($_POST){
    $keywords=$_POST['keywords'];
    $pageArr_username = $DB->fileInfo_username_to_obj("select adminfileInfo.* ,admininfo.username as username from adminfileInfo,admininfo
    where adminfileInfo.uid=admininfo.id and username like '%".$keywords."%'  limit " . ($pageModel->getPageNum() - 1) * $pageModel->getPageSize() . "," . $pageModel->getPageSize());
} else{
    $pageArr_username = $DB->fileInfo_username_to_obj("select adminfileInfo.* ,admininfo.username as username from adminfileInfo,admininfo
where adminfileInfo.uid=admininfo.id  limit " . ($pageModel->getPageNum() - 1) * $pageModel->getPageSize() . "," . $pageModel->getPageSize());
}
if ($pageArr_username > 0) {
    $pageModel->setPageUsernameDate($pageArr_username);
}
?>
<script>
    $(function (){
        $("#search").click(function (){
            var act="adminfileInfo.php";
            $("#form_Bulk_search").attr("action",act).submit();
        });
        $("#delete").click(function (){
            var admin_super=<?=$_SESSION['super']?>;
            var act="../Services/BulkdeleteAdminfileInfo.php";
            if (admin_super==1){
                $("#form_Bulk_search").attr("action",act).submit();
            }else {
                alert('抱歉，你的权限不足！');
            }
        });
    });
</script>
<body>
<form method="post" id="form_Bulk_search">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 管理员文件列表</strong></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="addFileInfo.php"> 添加内容</a> </li>
        <li style="padding-left: 800px">
                <input type="text" placeholder="请输入搜索关键字" name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />
                <a id="search" href="javascript:void(0)" class="button border-main icon-search" > 搜索</a>
        </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
          <th width="5%" style="text-align:left; padding-left:20px;"></th>
        <th width="5%" >ID</th>
        <th width="10%">所属管理员</th>
        <th>文件路径</th>
        <th>文件原始名称</th>
        <th width="8%">文件大小</th>
        <th>文件类型</th>
        <th width="10%">添加时间</th>
          <th width="10%">文件状态</th>
        <th width="15%">操作</th>
      </tr>
      <volist name="list" id="vo">

          <?php
          $data=$pageModel->getPageUsernameDate();
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
                      <td><?=$pageData->getFilename()?></td>
                      <td><?=$pageData->getTruename()?></td>
                      <td><font color="#00CC99"><?=$filesize?></font></td>
                      <td><?=$pageData->getFiletype()?></td>
                      <td><?=$pageData->getAddtime()?></td>
                      <td><?=$Userstatus?></td>
                      <td>
                          <div class="button-group"> <a class="button border-main" href="javascript:void(0)" onclick="return update(<?=$pageData->getId()?>)">
                                  <span class="icon-edit"></span> 修改</a>
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
    <tr>
        <td colspan="10">
            <div class="pagelist">
                <a href="adminfileInfo.php?<?=$pageModel->getPageNum(1)?>">首页</a>
                <a href="adminfileInfo.php?pageNum=<?=$pageModel->upPage()?>">上一页</a>
                <span>当前页为第<?=$pageModel->getPageNum()?>页</span>
                <span>总共<?=$pageModel->getDataCount()?>页</span>
                <a href="adminfileInfo.php?pageNum=<?=$pageModel->nextPage()?>">下一页</a>
                <a href="adminfileInfo.php?pageNum=<?=$pageModel->getDataCount()?>">尾页</a>
                <input id="Num" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" oninput="if(value<=0)value=1;if(value.length>4)value=value.slice(0,4)" name="textfield" type="number" min="1" step="1" size="10"  />
                <a href="javascript:void(0) "  onclick="goto()">转到</a>
            </div>
        </td>
    </tr>
</form>
<script type="text/javascript">
    function update(id){
        var file_status=<?=$pageData->getFilestatus()?>;
        var admin_super=<?=$_SESSION['super']?>;
        if (file_status==1){
            if (admin_super==1){
                window.location.href='updateAdminFileInfo.php?id='+id;
            }else {
                alert('抱歉，你的权限不足！');
            }
        }else {
            alert('文件已违规，源文件已删除');
        }

    }
    function goto(){
        var num=document.getElementById('Num').value;
        if (num><?=$pageModel->getDataCount()?>){
            alert("Data cannot be empty");
            document.getElementById('Num').value="";
        }else {
            window.location.href='adminfileInfo.php?pageNum='+num;
        }
    }
//单个删除
function del(id){
    var flag=confirm("您确定要删除吗?");
    var admin_super=<?=$_SESSION['super']?>;
    if (admin_super==1){
        if (flag) {
        window.location.href='../Services/deleteFileServices.php?id='+id;
      }else {
            alert('抱歉，你的权限不足！');
        }
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


</script>
</body>
</html>