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
    $arr = $DB->queryData("select  shopclassify.*,shopclassify_const.classifyParentName from shopclassify INNER JOIN shopclassify_const  on  shopclassify.parent=shopclassify_const.id
 where classifyName like '%".$keywords."%' ");
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
    $pageArr = $DB->ClassifyInfo_to_obj("select  shopclassify.*,shopclassify_const.classifyParentName from shopclassify INNER JOIN shopclassify_const  on  shopclassify.parent=shopclassify_const.id
 where classifyName like '%".$keywords."%' limit " . ($pageModel->getPageNum() - 1) * $pageModel->getPageSize() . "," . $pageModel->getPageSize());
}
else {
    $arr = $DB->queryData("select count(*) as id from Shopclassify");
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
    $pageArr = $DB->ClassifyInfo_to_obj("select  shopclassify.*,shopclassify_const.classifyParentName from shopclassify INNER JOIN shopclassify_const  on  shopclassify.parent=shopclassify_const.id
 limit " . ($pageModel->getPageNum() - 1) * $pageModel->getPageSize() . "," . $pageModel->getPageSize());
}
if (!empty($pageArr)) {
    $pageModel->setPageData($pageArr);
}
?>
<body>
<script>
    $(function () {
        $("#search").click(function () {
            var act = "Products_Classify.php";
            $("#shop_list").attr("action", act).attr("method", "get").submit();
        });
    });
</script>
<form action="" id="shop_list">
<div class=" page-content clearfix" style="margin-top: 20px;margin-bottom: 30px">
 <div id="products_style">
     <div class="add_delete_div">
         <a href="javascript:void(0);" onclick="member_edit('添加类型','Product_creat.php','','','600')" title="添加类型" class="btn btn-warning Order_form"><i class="icon-plus"></i>添加类型</a>
         <a href="javascript:void(0);" class="btn btn-danger" id="classify_but" onclick="Bulk_delete_classify()"><i class="icon-trash"></i>批量删除</a>
     </div>
     <div class="search-div">
         <ul class="search_content clearfix">
             <li><label><input type="text" name="keywords" class="search_input" placeholder="请搜索类型关键字" value="<?=$keywords?>"/></label></li>
             <li style="width:60px;"><button type="button" id="search" class="btn_search"><i class="icon-search"></i>查询</button></li>
         </ul>
     </div>
     </div>
         <div>
       <table class="table table-striped table-bordered table-hover" id="sample-table">
		<thead>
		    <tr>
				<th width="25px"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
				<th width="50px">编号</th>
				<th width="250px">父类型</th>
				<th width="250px">类型名称</th>
                <th width="100px">备注</th>
				<th width="70px">状态</th>
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
                    $status="<span class='label label-success radius'>已启用</span>";
                    $function="member_stop(this,".$pageData->getId().")";
                }else{
                    $status="<span class='label label-defaunt radius'>已停用</span>";
                    $function="member_start(this,".$pageData->getId().")";
                }
        ?>
       <tr>
        <td width="25px"><label><input type="checkbox" class="ace" name="classifyId[]" value="<?=$pageData->getId()?>" ><span class="lbl"></span></label></td>
<!--           id-->
        <td width="50px"><?=$pageData->getId()?></td>
           <!--           名称-->
        <td width="250px"><p style="font-size: 14px;"><?=$pageData->getParentName()?></p></td>
<!--           名称-->
        <td width="250px"><?=$pageData->getClassify()?></td>
<!--           备注-->
           <td><?=$pageData->getRemark()?></td>
<!--           状态-->
        <td class="td-status"><?=$status?></td>
        <td class="td-manage" width="200px">
        <a onClick="<?=$function?>"  href="javascript:void(0);" title="停用"  class="btn btn-xs btn-success"><i class="icon-ok bigger-120"></i></a>
        <a title="编辑" onclick="member_edit('修改类型','Ud_Child_Product_creat.php?id=<?=$pageData->getId()?>','','','600')" href="javascript:;"  class="btn btn-xs btn-info" ><i class="icon-edit bigger-120"></i></a>
        <a title="删除" href="javascript:void(0);"  onclick="member_del(this,<?=$pageData->getId()?>)" class="btn btn-xs btn-warning" ><i class="icon-trash  bigger-120"></i></a>
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
        <a href="Products_Classify.php?<?= $pageModel->getPageNum(1) ?> && keywords=<?=$keywords?>">首页</a>
        <a href="Products_Classify.php?pageNum=<?= $pageModel->upPage() ?> && keywords=<?=$keywords?>">上一页</a>
        <span>当前页为第<?= $pageModel->getPageNum() ?>页</span>
        <span>总共<?= $pageModel->getDataCount() ?>页</span>
        <a href="Products_Classify.php?pageNum=<?= $pageModel->nextPage() ?> && keywords=<?=$keywords?>">下一页</a>
        <a href="Products_Classify.php?pageNum=<?= $pageModel->getDataCount() ?> && keywords=<?=$keywords?>">尾页</a>
        <label for="Num">
            <input id="Num" value="<?=$pageModel->getPageNum()?>" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" oninput="if(value<=0)value=1;if(value.length>4)value=value.slice(0,4)" name="textfield" type="number" min="1" step="1" size="10"/>
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
    function Bulk_delete_classify(){
        layer.confirm('确定要删除商品信息吗？',function (){
            if ($('input[name*="classifyId"]:checked').length!=0){
                var classifyId={};
                $('input[name*="classifyId"]:checked').each(function (index){
                    classifyId[index]=$(this).val();
                });
                $.ajax({
                    type:'post',
                    url:'../Services/BulkdeClassifyServices.php',
                    data:{'id':classifyId},
                    dataType:'text',
                    success:function (result){
                        if (result=="success"){
                            window.location.reload();
                        }
                        if (result=="error"){
                            layer.msg('删除失败！',{icon:0});
                        }
                    },
                });
            }
            else{
                layer.msg('请选择之后再进行删除',{icon:0});
            }
        });
    }
    function goto() {
        var num = document.getElementById('Num').value;
        var keywords="<?=$keywords?>";
        if (num > <?=$pageModel->getDataCount()?>) {
            layer.msg('没有查询到数据',{icon:0,time:1000});
            document.getElementById('Num').value = "";
        } else {
            window.location.href = 'Products_Classify.php?pageNum='+num+'&&keywords='+keywords;
        }
    }
$(function() {
	$("#products_style").fix({
		float : 'left',
		//minStatue : true,
		skin : 'green',
		durationTime :false,
		spacingw:30,//设置隐藏时的距离
	    spacingh:260,//设置显示时间距
	});
});
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
            url:'../UdServices/UdShopClassify.php',
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
            url:'../UdServices/UdShopClassify.php',
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
/*产品-编辑*/
function member_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}

/*产品-删除*/
function member_del(tr,id){
	layer.confirm('确认要删除吗？',function(){
	    $.ajax({
            type:'get',
            url:'../ClassifyServices/deClassifyChildServices.php',
            data:{'id':id},
            dataType:'text',
            success:function (result){
                if (result=="success"){
                    layer.msg('删除成功',{icon:1,time:1000});
                    $(tr).parent().parent().remove();
                }else {
                    layer.msg('删除失败，已有商品在使用该类型',{icon:0,time:1000});
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
