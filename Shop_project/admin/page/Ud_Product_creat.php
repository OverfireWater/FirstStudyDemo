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
        .layui-btn{
            margin-left: 20px;
        }
    </style>
</head>
<?php
session_start();
include "../DB/DBhelper.php";
$db=new DBhelper();
if ($_GET['id']){
    $id=$_GET['id'];
    $con=$db->queryData("select * from shopClassify_const where id=".$id);
}
?>
<body>
<div class="container">
    <div class="wrap">
        <div class="con-right">
            <div class="tab-main">
                <ul>
                    <li class="tab-active" id="Shop_add">子类型修改</li>
                </ul>
            </div>
            <div class="tab-con">
                <div class="tab-items con-active">
                    <form class="layui-form">
                        <div class="shop_add-width">
                            <div class="shop-add-border-margin">
                                <div class="shop-name">
                                    <span>修改类型：</span>
                                    <label>
                                        <input type="text" id="classify_name" name="name" value="<?=$con[0]['classifyParentName']?>" class="input-shop" placeholder="请输入类型">
                                        <span class="display-name" style="display: none">&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: red">*&nbsp;&nbsp;&nbsp;</span>请输入类型</span>
                                    </label>
                                </div>

                                <div class="shop-name" style="display: inline-block;">
                                    <span style="margin-bottom: 100px;display: block;float:left;">类型备注：</span>
                                    <label>
                                        <textarea name="remark" id="remark" style="width: 500px;height: 200px;float:left;font-size: 13px;margin-left: 5px" placeholder="类型简介"><?=$con[0]['remark']?></textarea>
                                    </label>
                                </div>
                                <div class="submit-shop">
                                    <input type="button" id="shop_but" style="border: none !important;" class="layui-btn layui-btn-normal" value="修改类型">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="js/jquery-1.8.3.min.js"></script>
<script src="../layui/layui.js"></script>
<script>
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
                    url:"../ClassifyServices/UdParentClassifyServices.php",
                    data:{"classify_name":classify_name,"remark":$("#remark").val(),"id":<?=$id?>},
                    dataType:"text",
                    success:function (result){
                        if (result=="success"){
                            layer.msg('修改成功！',{icon:1});
                        }
                        if (result=="error"){
                            layer.msg('修改失败！',{icon:0});
                        }
                    }
                });
            }else {
                layer.msg('请完善当前类型的信息修改！',{icon:0});
            }
        });
    });
</script>
</html>