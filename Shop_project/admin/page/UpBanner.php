<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
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
        .const{
            width: 120px;
        }
        .layui-btn{
            width: 120px;
            height: 40px;
            line-height: 40px;
            margin-bottom: 10px;
            border: none!important;
        }
        #Shop_pic{
            background-color: #1aa1e4;
            color: white;
        }
    </style>
</head>
<body>
<?php
if ($_GET['id']){
    $id=$_GET['id'];
}
//?>
<div class="container">
    <div class="wrap">
        <div class="con-right">
            <div class="tab-main">
                <ul>
                    <li id="Shop_pic">轮播图修改</li>
                </ul>
            </div>
            <div class="tab-con">
                <div class="tab-items con-active">
                    <div class="shop-name">
                            <div class="shop_add-width">
                                <div class="shop-add-border-margin">
                                    <form  id="form" enctype="multipart/form-data">
                                    <div class="const">
                                        <button type="button" id="file_choose_but" class="layui-btn">选择图片</button>
                                        <input type="file" name="file" id="file" style="display: none" accept="image/jpeg,image/png" onchange="choose_file_block()">
                                        <div class="img dis-none">
                                            <img src="" id="choose_img" width="120" height="120" alt="">
                                        </div>
                                        <input type="button" id="file_sub" value="修改" style="margin-top: 10px" class="layui-btn dis-none">
                                    </div>
                                    </form>
                                </div>
                            </div>
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
    function choose_file_block(){
        if ($('#file').val()){
            var files=document.getElementById('file').files[0];
            var url=window.URL.createObjectURL(files);
            $('#choose_img').attr('src',url);
            $('.img').removeClass('dis-none');
            $('#file_sub').removeClass('dis-none');
        }else {
            $('#choose_img').attr('src',"");
            $('.img').addClass('dis-none');
        }
    }
    $(function (){
        $('#file_sub').click(function (){
            var files_data=new FormData($('#form')[0]);
            // files_data.append('files','122121');
            // console.log(files_data.get('file'));
            $.ajax({
                type:"post",
                url:"../UdServices/UdBannerServices.php?id=<?=$id?>",
                data:files_data,
                dataType:"text",
                processData: false, // 告诉jQuery不要去处理发送的数据
                contentType: false, // 告诉jQuery不要去设置Content-Type请求头
                success:function (result){
                    if (result=="repeat_file") {
                        layer.msg('已有该图片!!', {icon: 0});
                    }
                    if (result=="error"){
                        layer.msg('图片上传失败，请重新上传!!',{icon: 0});
                    }
                    if (result=="success"){
                        layer.msg('修改成功!!', {icon: 1});
                    }
                }
            });
        });
    });

    $(function (){
        $('#file_choose_but').click(function (){
            $('#file').trigger('click');
        });
    });
</script>
</html>