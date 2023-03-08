<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加商品</title>
    <link rel="stylesheet" href="css/addShop.css">
    <link rel="stylesheet" href="../layui/css/layui.css">
    <style>
        body,th{
            font: 12px tahoma, Arial, Verdana, sans-serif;
        }
        .dis-none{
            display: none;
        }
        input{
            padding-left: 5px;
        }
         ul{
             padding: 0;
         }
        .wrap {
            width: 1210px;
            margin: 20px;
            display: inline-block;
        }
        .tab-main {
            width: 1170px;
            height: 39px;
            background-color: #f7f7f7;
            box-sizing: border-box;
            text-align: left;
            margin-left: 17px;
        }
        .tab-main ul{
            padding: 0;
        }

        .tab-main li {
            padding: 10px 25px;
            border-radius: 5px;
            display: inline-block;
            font-size: 14px;
            color: #666;
            cursor: pointer;
        }

        .tab-main .tab-active {
            background-color: #1e9fff;
            color: #fff;
            transition: all 0.5s;
        }

        .tab-con {
            width: 1170px;
        }

        .tab-items {
            display: none;
            width: 100%;
            height: 100%;
        }

        .con-active {
            display: block;
        }
        .pic_w_h{
            width: 200px;
            height: 200px;
        }
        .pic_upload{
            display: inline-block;
        }
        .pic_span{
            display: block;
            float: left;
        }
        .layui-btn{
            margin-left: 20px;
        }
    </style>
</head>
<?php
session_start();
include "../DB/DBhelper.php";
$db=new DBhelper();
$con=$db->queryData("select * from shopClassify_const ");
?>
<body>
<div class="container">
    <div class="wrap">
        <div class="con-right">
            <div class="tab-main">
                <ul>
                    <li class="tab-active" id="Shop_add">父类型添加</li>
                    <li id="Shop_pic">子分类添加</li>
                </ul>
            </div>
            <div class="tab-con">
                <div class="tab-items con-active">
                    <form class="layui-form">
                        <div class="shop_add-width">
                            <div class="shop-add-border-margin">
                                <div class="shop-name">
                                    <span>添加类型：</span>
                                    <label>
                                        <input type="text" id="classify_name" name="name" class="input-shop" placeholder="请输入类型">
                                        <span class="display-name" style="display: none">&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: red">*&nbsp;&nbsp;&nbsp;</span>请输入类型</span>
                                    </label>
                                </div>

                                <div class="shop-name" style="display: inline-block;">
                                    <span style="margin-bottom: 100px;display: block;float:left;">类型备注：</span>
                                    <label>
                                        <textarea name="remark" id="remark" style="width: 500px;height: 200px;float:left;font-size: 13px;margin-left: 5px" placeholder="类型简介"></textarea>
                                    </label>
                                </div>
                                <div class="submit-shop">
                                    <input type="button" id="shop_but" style="border: none !important;" class="layui-btn layui-btn-normal" value="保存类型">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-items">
                    <div class="shop-name">
                        <form action="" class="layui-form">
                            <div class="shop-name" style="display: inline-block;line-height: 38px">
                                <span style="float:left;display: inline-block;width: 72px"">选择类型：</span>

                                <div style="display: inline-block;margin-left: 4px;">
                                    <select id="selectUser" name="city" lay-verify="" lay-search>
                                        <?php
                                        if (!empty($con)){
                                            for ($i=0;$i<count($con);$i++){
                                                $classify=$con[$i];
                                        ?>
                                                <option value="<?=$classify['id']?>"><?=$classify['classifyParentName']?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <span>*为该类型添加子类型</span>
                            </div>
                            <div class="shop-name">
                                <span style="display: inline-block;width: 72px">添加类型：</span>
                                <label>
                                    <input type="text" id="child_name" name="child_name" class="input-shop" placeholder="请输入类型">
                                    <span class="display-name" style="display: none">&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: red">*&nbsp;&nbsp;&nbsp;</span>请输入类型</span>
                                </label>
                            </div>

                            <div class="shop-name" style="display: inline-block;">
                                <span style="margin-bottom: 100px;float:left;display: inline-block;width: 72px"">类型备注：</span>
                                <label>
                                    <textarea name="remark" id="child_remark" style="width: 500px;height: 200px;float:left;font-size: 13px;margin-left: 5px" placeholder="类型简介"></textarea>
                                </label>
                            </div>
                            <div class="submit-shop">
                                <input type="button" id="classify_but" style="border: none !important;" class="layui-btn layui-btn-normal" value="上传类型">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</body>
<script src="js/jquery-1.8.3.min.js"></script>
<script src="../layui/layui.js"></script>
<script>
    //选显卡
    let tabMain = document.querySelectorAll('.tab-main li');
    let tabItems = document.querySelectorAll('.tab-items');
    //拿到所有li
    for (let i = 0; i < tabMain.length; i++) {
        //绑定点击事件
        tabMain[i].onclick = function () {
            //清空
            for (let j = 0; j < tabMain.length; j++) {
                tabMain[j].className = '';
                tabItems[j].className = 'tab-items';
            }
            //对应的div显示
            tabItems[i].className = 'con-active';
            //对应的li修改样式
            tabMain[i].className = 'tab-active';
        }
    }

    //判断是否为空
    $(function (){

        //点击ajax提交
        $("#shop_but").click(function (){
            var classify_name=$('#classify_name').val();
            if ( classify_name==""||classify_name==null){
                $('.display-name').removeAttr('style',"");
            } else {
                $('.display-name').addClass('dis-none');
            }
            if (classify_name!="" && classify_name!=null ){
                $.ajax({
                    type:"post",
                    url:"../ClassifyServices/addClassifyParentServices.php",
                    data:{"classify_name":classify_name,"remark":$("#remark").val()},
                    dataType:"text",
                    success:function (result){
                        if (result=="success"){
                            layer.msg('保存成功！',{icon:1});
                            setInterval('window.location.reload()',1000);
                        }
                        if (result=="error"){
                            layer.msg('保存失败！',{icon:0});
                        }
                        if (result=="repeat"){
                            layer.msg('已存在该类型！',{icon:0});
                            $('#classify_name').val("");
                            $("#remark").val("")
                        }
                    }
                });
            }else {
                layer.msg('请完善当前类型添加！',{icon:0});
            }
        });

        //点击ajax提交  子类型添加
        $("#classify_but").click(function (){
            var classify_child_name=$('#child_name').val();
            if ( classify_child_name==""||classify_child_name==null){
                $('.display-name').removeAttr('style',"");
            } else {
                $('.display-name').addClass('dis-none');
            }
            if (classify_child_name!="" && classify_child_name!=null ){
                $.ajax({
                    type:"post",
                    url:"../ClassifyServices/addClassifyServices.php",
                    data:{"classify_child_name":classify_child_name,'Parent_classify':$('#selectUser').val(),"remark":$("#child_remark").val()},
                    dataType:"text",
                    success:function (result){
                        if (result=="success"){
                            layer.msg('保存成功！',{icon:1});
                        }
                        if (result=="error"){
                            layer.msg('保存失败！',{icon:0});
                        }
                        if (result=="repeat"){
                            layer.msg('已存在该类型！',{icon:0});
                            $('#child_name').val("");
                            $("#child_remark").val("");
                        }
                    }
                });
            }else {
                layer.msg('请完善当前商品的信息添加！',{icon:0});
            }
        });
    });
</script>
</html>