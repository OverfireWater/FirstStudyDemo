<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="renderer" content="webkit">
    <title></title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script>
        $(function (){
            $("#search").click(function (){
                $("#submit").trigger("click");
            });
        });
    </script>
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
    $arr = $DB->queryData("select count(*) as id from userInfo where username '%".$keywords."%' ");
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
    $pageArr = $DB->userInfo_to_obj("select * from userInfo where username like '%".$keywords."%' limit " . ($pageModel->getPageNum() - 1) * $pageModel->getPageSize() . "," . $pageModel->getPageSize());
}else{
    $arr = $DB->queryData("select count(*) as id from userInfo");
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
    $pageArr = $DB->userInfo_to_obj("select * from userInfo limit " . ($pageModel->getPageNum() - 1) * $pageModel->getPageSize() . "," . $pageModel->getPageSize());
}

if ($pageArr > 0) {
    $pageModel->setPageData($pageArr);
}
?>
<script>
    $(function (){
        $("#search").click(function (){
            var act="userInfo.php";
            $("#form_Bulk_search").attr("action",act).attr("method","get").submit();
        });
        $("#delete").click(function (){
            var act="../Services/BulkdeleteuserInfo.php";
            $("#form_Bulk_search").attr("action",act).attr("method","post").submit();
        });
    });
</script>
<body>
<form  id="form_Bulk_search">
<div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
    <ul class="search" style="padding-left:10px;">
        <li style="padding-left: 800px;padding-top: 10px">
                <input type="text" placeholder="请输入账号进行搜索" name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />
                <a id="search" href="javascript:void(0)" class="button border-main icon-search" > 搜索</a>
        </li>
    </ul>
    <table class="table table-hover text-center">
        <tr>
            <th width="5%"></th>
            <th width="10%">ID</th>
            <th width="20%">账号</th>
            <th width="15%">会员昵称</th>
            <th width="10%">修改时间</th>
            <th width="10%">用户状态</th>
            <th width="15%">操作</th>
        </tr>

        <?php
        $data=$pageModel->getPageData();
        if ($data!=null){
            for ($i=0;$i<count($data);$i++){
                $pageData=$data[$i];
                if ($pageData->getUserstatus()=="1"){
                    $Userstatus="正常";
                }else{
                    $Userstatus="离线";
                }
        ?>
        <tr>
            <td style="text-align:left; padding-left:20px;"><input type="checkbox" name="file_id[]" value="<?=$pageData->getId()?>" /></td>
            <td><?=$pageData->getId()?></td>
            <td><?=$pageData->getUsername()?></td>
            <td><?=$pageData->getNickname()?></td>
            <td><?=$pageData->getRegtime()?></td>
            <td><?=$Userstatus?></td>
            <td>
                <div class="button-group">
                    <a class="button border-main" href="updateUserInfo.php?id=<?=$pageData->getId()?>"><span class="icon-edit"></span> 修改</a>
                    <a class="button border-red" href="javascript:void(0) " onclick="return del(<?=$pageData->getId()?>)"><span class="icon-trash-o"></span> 删除</a>
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
    </table>
</div>
<tr>
    <td colspan="8">
        <div class="pagelist"><a href="userInfo.php?<?=$pageModel->getPageNum(1)?>&& keywords=<?=$keywords?>">首页</a>
            <a href="userInfo.php?pageNum=<?=$pageModel->upPage()?>&& keywords=<?=$keywords?>">上一页</a>
            <span>当前页为第<?=$pageModel->getPageNum()?>页</span>
            <span>总共<?=$pageModel->getDataCount()?>页</span>
            <a href="userInfo.php?pageNum=<?=$pageModel->nextPage()?>&& keywords=<?=$keywords?>">下一页</a>
            <a href="userInfo.php?pageNum=<?=$pageModel->getDataCount()?>&& keywords=<?=$keywords?>">尾页</a>
            <input id="Num" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" oninput="if(value<=0)value=1;if(value.length>4)value=value.slice(0,4)" name="textfield" type="number" min="1" step="1" size="10"  />
            <a href="javascript:void(0) "  onclick="goto()">转到</a>
        </div>
    </td>

</tr>
</form>
</body>
<script type="text/javascript">
    function del(id) {
        var flag=confirm("您确定要删除吗?");
        if (flag) {
            window.location.href='../Services/deleteUserInfo.php?id='+id;
        }else {

        }
    }
    function goto(){
        var num=document.getElementById('Num').value;
        var keywords="<?=$keywords?>";
        if (num><?=$pageModel->getDataCount()?>){
            alert("Data cannot be empty");
            document.getElementById('Num').value="";
        }else {
            window.location.href='userInfo.php?pageNum='+num+'&&keywords='+keywords;
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
</html>