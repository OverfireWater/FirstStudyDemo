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
        <script type="text/javascript" src="js/H-ui.js"></script>
        <script type="text/javascript" src="js/H-ui.admin.js"></script>
        <script src="assets/layer/layer.js" type="text/javascript" ></script>
        <script type="text/javascript" src="Widget/zTree/js/jquery.ztree.all-3.5.min.js"></script>
<title>产品列表</title>
    <style type="text/css">
        body,td,th{
            font: 13px tahoma, Arial, Verdana, sans-serif !important;
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
        .search_input{
            width: 600px;
            font-size: 16px;
            height: 35px;
        }
        #products_style{
            display: inline-block;
            margin-bottom: 20px;
        }
        td{
            padding: 15px!important;
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
$DB=new DBhelper();
    $pageArr = $DB->topic_to_obj("select * from studyPic");
?>
<body>
<form action="" method="post" id="shop_list">
<div class=" page-content clearfix" style="margin-top: 20px;margin-bottom: 30px">
 <div id="products_style">
     <div class="search-div">
         <ul class="search_content clearfix">
             <li><label><input type="text" name="keywords" id="search_sub" class="search_input" placeholder="请搜索商品关键字" </label></li>
         </ul>
     </div>
     </div>
         <div>
       <table class="table table-striped table-bordered table-hover" id="sample-table">
		<thead>
		    <tr>
				<th width="250px">题目</th>
				<th width="100px">答案一</th>
				<th width="180px">答案二</th>
                <th width="100px">答案三</th>
				<th width="200px">答案四</th>
			</tr>
		</thead>
	    <tbody>
        <?php
            if (!empty($pageArr)) {
                for ($i = 0; $i < count($pageArr); $i++) {
                    $pageData = $pageArr[$i];
            ?>
           <tr>
    <!--           名称-->
            <td width="250px"><?=$pageData->getTopic()?></td>
    <!--           时间-->
            <td width="250px"><?=$pageData->getAns1()?></td>
    <!--           推荐-->
               <td width="250px"><?=$pageData->getAns2()?></td>
    <!--           状态-->
               <td width="250px"><?=$pageData->getAns3()?></td>
    <!--           备注-->
               <td width="250px"><?=$pageData->getAns4()?></td>
            </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
    </div>
  </div>
</form>
</body>
</html>
<script type="text/javascript">
    $(function(){
        $('#search_sub').keyup(function(){
            var sstxt=$('#search_sub').val();
            $("table tbody tr")
                .hide()
                .filter(":contains('"+sstxt+"')")
                .show();
        })
        $("table tbody tr").show();
    })
</script>
<script type="text/javascript">
//初始化宽度、高度
 $(".widget-box").height($(window).height()-215);
$(".table_menu_list").width($(window).width()-260);
 $(".table_menu_list").height($(window).height()-215);
  //当文档窗口发生改变时 触发
    $(window).resize(function() {
        $(".widget-box").height($(window).height() - 215);
        $(".table_menu_list").width($(window).width() - 260);
        $(".table_menu_list").height($(window).height() - 215);
    });
</script>
