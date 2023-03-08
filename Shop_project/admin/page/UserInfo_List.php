<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="stylesheet" href="assets/css/ace.min.css" />
        <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
        <link rel="stylesheet" href="Widget/zTree/css/zTreeStyle/zTreeStyle.css" type="text/css">
        <link href="Widget/icheck/icheck.css" rel="stylesheet" type="text/css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
	    <script src="js/jquery-1.9.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/typeahead-bs2.min.js"></script>
		<!-- page specific plugin scripts -->
<!--    <script src="assets/js/jquery.dataTables.min.js"></script>-->
<!--    <script src="assets/js/jquery.dataTables.bootstrap.js"></script>-->
        <script type="text/javascript" src="js/H-ui.js"></script>
        <script type="text/javascript" src="js/H-ui.admin.js"></script>
        <script src="assets/layer/layer.js" type="text/javascript" ></script>
        <script type="text/javascript" src="Widget/zTree/js/jquery.ztree.all-3.5.min.js"></script>
<title>产品列表</title>
    <style type="text/css">
        body,td,th{
            font: 12px tahoma, Arial, Verdana, sans-serif !important;
        }
        a{
            text-decoration: none;
        }
        a:hover{
            text-decoration: none;
            border-color: #438eb9;
            color: #438eb9;
        }
        input:focus{
            border-color: #438eb9 !important;
        }
        .search-div{
            width: 800px;
            float: left;
            font-size: 16px;
            text-align: right;
        }
        .search-div li{
            display: inline-block;
        }
        .btn_search{
            padding: 5px;
            border: none;
            background-color: #2E82D0;
            color: white;
            border-radius: 3px;
        }
        .add_delete_div{
            float: left ;
        }
        .search_input{
            width: 200px;
            font-size: 16px;
            height: 35px;
        }
        #products_style{
            display: inline-block;
            margin-bottom: 20px;
        }
        td{
            font-size: 16px;
        }
        .pageNum_list{
            text-align: center;
        }
        .pageNum_list a{
            font-size: 16px;
            background-color: #e7e7e7;
            padding: 5px;
            border-radius: 5px;
        }
        .pageNum_list span{
            font-size: 16px;
            padding: 5px;
        }
    </style>
</head>
<?php
include "../DB/DBhelper.php";
include "../Entily/pageInfo.php";
$DB=new DBhelper();
$pageModel = new pageInfo();
if ($_GET['keywords'] ) {
    $keywords = $_GET['keywords'];
    $arr = $DB->queryData("select * from userInfo where username like '%".$keywords."%' ");
    if (!empty($arr)){
        $Count = count($arr);
    }
    $pageModel->setCount($Count);
    $pageNum = 1;
    $pageModel->setPageNum($pageNum);
    if ($_GET['pageNum']) {
        $pageNum = $_GET['pageNum'];
        $pageModel->setPageNum($pageNum);
    }
    $pageSize = 10;
    $pageModel->setPageSize($pageSize);
    $pageArr = $DB->userInfo_to_obj("select * from userInfo  where  username like '%".$keywords."%' limit " . ($pageModel->getPageNum() - 1) * $pageModel->getPageSize() . "," . $pageModel->getPageSize());
}
else {
    $arr = $DB->queryData("select count(*) as id from userInfo");
    $Count = $arr[0]['id'];
    $pageModel->setCount($Count);
    $pageNum = 1;
    $pageModel->setPageNum($pageNum);
    if ($_GET['pageNum']) {
        $pageNum = $_GET['pageNum'];
        $pageModel->setPageNum($pageNum);
    }
    $pageSize = 10;
    $pageModel->setPageSize($pageSize);
    $pageArr = $DB->userInfo_to_obj("select * from userInfo order by id asc limit " . ($pageModel->getPageNum() - 1) * $pageModel->getPageSize() . "," . $pageModel->getPageSize());
}
if (!empty($pageArr)) {
    $pageModel->setPageData($pageArr);
}
?>
<body>
<script>
    $(function () {
        $("#search").click(function () {
            var act = "UserInfo_List.php";
            $("#shop_list").attr("action", act).attr("method", "get").submit();
        });
    });
</script>
<form action="" id="shop_list">
<div class=" page-content clearfix" style="margin-top: 20px;margin-bottom: 30px">
 <div id="products_style">
     <div class="search-div">
         <ul class="search_content clearfix">
             <li><label><input type="text" name="keywords" class="search_input" placeholder="请搜索商品关键字" value="<?=$keywords?>"/></label></li>
             <li style="width:60px;"><button type="button" id="search" class="btn_search"><i class="icon-search"></i>查询</button></li>
         </ul>
     </div>
     </div>
         <div>
       <table class="table table-striped table-bordered table-hover" id="sample-table">
		<thead>
		    <tr>
				<th width="25px"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
				<th width="80px">编号</th>
				<th width="250px">用户头像</th>
				<th width="200px">用户名称</th>
				<th width="50px">电话号码</th>
                <th width="70px">添加时间</th>
				<th width="80px">状态</th>
				<th width="200px">操作</th>
			</tr>
		</thead>
	<tbody>
        <?php
        $data = $pageModel->getPageData();
        if (!empty($data)) {
            for ($i = 0; $i < count($data); $i++) {
                $pageData = $data[$i];
                if ($pageData->getStatus()==1){
                    $status="<span class='label label-success radius'>未违规</span>";
                    $function="member_stop(this,".$pageData->getUserId().")";
                }else{
                    $status="<span class='label label-defaunt radius'>已违规</span>";
                    $function="member_start(this,".$pageData->getUserId().")";
                }
        ?>
       <tr>
        <td width="25px"><label><input type="checkbox" class="ace" ><span class="lbl"></span></label></td>
<!--           id-->
        <td width="80px"><?=$pageData->getUserId()?></td>
<!--           图片-->
           <td width="100px" height="100px"><img width="100" height="100" src="<?=$pageData->getImg()?>" alt=""></td>
<!--           路径-->
           <td><?=$pageData->getUsername()?></td>
<!--           大小-->
        <td width="250px"><?=$pageData->getPhone()?>kb</td>
<!--           时间-->
        <td width="180px"><?=$pageData->getDatetime()?></td>
<!--           状态-->
           <td class="td-status"><?=$status?></td>
        <td class="td-manage" >
        <a onClick="<?=$function?>"  href="javascript:;" title="停用"  class="btn btn-xs btn-success"><i class="icon-ok bigger-120"></i></a>
       </td>
	  </tr>
        <?php
            }
        }
        ?>
    </tbody>
    </table>
    </div>
    <div class="pageNum_list">
        <a href="UserInfo_List.php?<?= $pageModel->getPageNum(1) ?>&& keywords=<?=$keywords?>"">首页</a>
        <a href="UserInfo_List.php?pageNum=<?= $pageModel->upPage() ?>&& keywords=<?=$keywords?>"">上一页</a>
        <span>当前页为第<?= $pageModel->getPageNum() ?>页</span>
        <span>总共<?= $pageModel->getDataCount() ?>页</span>
        <a href="UserInfo_List.php?pageNum=<?= $pageModel->nextPage() ?>&& keywords=<?=$keywords?>"">下一页</a>
        <a href="UserInfo_List.php?pageNum=<?= $pageModel->getDataCount() ?>&& keywords=<?=$keywords?>"">尾页</a>
        <label for="Num">
            <input id="Num" value="" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" oninput="if(value<=0)value=1;if(value.length>4)value=value.slice(0,4)" name="textfield" type="number" min="1" step="1" size="10"/>
            <a href="javascript:void(0) " onclick="goto()">转到</a>
        </label>
    </div>
  </div>
 </div>
</div>
</form>
</body>
</html>
<script>
    function goto() {
        var num = document.getElementById('Num').value;
        var keywords="<?=$keywords?>";
        if (num > <?=$pageModel->getDataCount()?>) {
            alert("没有查询到数据");
            document.getElementById('Num').value = "";
        } else {
            window.location.href = 'UserInfo_List.php?pageNum='+num+'&&keywords='+keywords;
        }
    }
</script>
<script type="text/javascript">
//初始化宽度、高度
 $(".widget-box").height($(window).height()-215);
$(".table_menu_list").width($(window).width()-260);
 $(".table_menu_list").height($(window).height()-215);
  //当文档窗口发生改变时 触发
    $(window).resize(function(){
	$(".widget-box").height($(window).height()-215);
	 $(".table_menu_list").width($(window).width()-260);
	  $(".table_menu_list").height($(window).height()-215);
	})
$(document).ready(function(){
	var t = $("#treeDemo");
	t = $.fn.zTree.init(t, setting, zNodes);
	demoIframe = $("#testIframe");
	demoIframe.bind("load", loadReady);
	var zTree = $.fn.zTree.getZTreeObj("tree");
	zTree.selectNode(zTree.getNodeByParam("id",'11'));
});
/*产品-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
        $.ajax({
            type:'post',
            url:'../UdServices/UdUserStatus.php',
            data:{"shopId":id,"status":0},
            dataType:"text",
            success:function (result){
                if (result=="success"){
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,'+id+')" href="javascript:;" title="启用"><i class="icon-ok bigger-120"></i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
                    $(obj).remove();
                    layer.msg('已停用!',{icon: 5,time:1000});
                }
            }
        });
	});
}

/*产品-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
        $.ajax({
            type:'post',
            url:'../UdServices/UdUserStatus.php',
            data:{"shopId":id,"status":1},
            dataType:"text",
            success:function (result) {
                if (result=="success"){
                    $(obj).parents("tr").find(".td-manage").prepend("<a style='text-decoration:none' class='btn btn-xs btn-success' onClick='member_stop(this,"+id+")' href='javascript:;' title='停用'><i class='icon-ok bigger-120'></i></a>");
                    $(obj).parents("tr").find(".td-status").html("<span class='label label-success radius'>已启用</span>");
                    $(obj).remove();
                    layer.msg('已启用!', {icon: 6, time: 1000});
                }
            }
        });
	});
}
//面包屑返回值
var index = parent.layer.getFrameIndex(window.name);
parent.layer.iframeAuto(index);
$('.Order_form').on('click', function(){
	var cname = $(this).attr("title");
	var chref = $(this).attr("href");
	var cnames = parent.$('.Current_page').html();
	var herf = parent.$("#iframe").attr("src");
    parent.$('#parentIframe').html(cname);
    parent.$('#iframe').attr("src",chref).ready();;
	parent.$('#parentIframe').css("display","inline-block");
	parent.$('.Current_page').attr({"name":herf,"href":"javascript:void(0)"}).css({"color":"#4c8fbd","cursor":"pointer"});
	//parent.$('.Current_page').html("<a href='javascript:void(0)' name="+herf+" class='iframeurl'>" + cnames + "</a>");
    parent.layer.close(index);

});
</script>
