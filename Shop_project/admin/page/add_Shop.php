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
$con=$db->queryData("select * from shopclassify order by id asc ");
?>
<body>
<div class="container">
    <div class="wrap">
        <div class="con-right">
            <div class="tab-main">
                <ul>
                    <li class="tab-active" id="Shop_add">添加商品</li>
                    <li id="Shop_pic">商品图片</li>
                    <li id="Shop_details">商品类型</li>
                    <li id="Shop_classify">商品详情</li>
                </ul>
            </div>
            <div class="tab-con">
                <div class="tab-items con-active">
                    <form class="layui-form">
                        <div class="shop_add-width">
                            <div class="shop-add-border-margin">
                                <div class="shop-name">
                                    <span>添加商品：</span>
                                    <label>
                                        <input type="text" id="name" name="name" class="input-shop" placeholder="请输入商品标题">
                                        <span class="display-name" style="display: none">&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: red">*&nbsp;&nbsp;&nbsp;</span>请输入商品标题</span>
                                    </label>
                                </div>
                                <div class="shop-name" style="display: inline-block;line-height: 38px">
                                    <span style="float:left;">添加类型：</span>
                                    <div style="display: inline-block;margin-left: 4px;">
                                        <select id="selectUser" name="city" lay-verify="" lay-search>
                                            <?php
                                            if (!empty($con)){
                                                for ($i=0;$i<count($con);$i++){
                                                    $classify=$con[$i];
                                            ?>
                                            <option value="<?=$classify['id']?>"><?=$classify['classifyName']?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="shop-name">
                                    <span>是否新品：</span>
                                        <input type="radio" name="news" id="news" value="1" title="是">
                                        <input type="radio" id="news" name="news" value="0" title="否" checked>
                                </div>
                                <div class="shop-name">
                                    <span>是否推荐：</span>
                                        <input type="radio" name="reCom" id="reCOm" value="1" title="是">
                                        <input type="radio" id="reCOm" name="reCom" value="0" title="否" checked>
                                </div>
                                <div class="shop-name" style="display: inline-block;">
                                    <span style="margin-bottom: 100px;display: block;float:left;">商品备注：</span>
                                    <label>
                                        <textarea name="remark" id="remark" style="width: 500px;height: 200px;float:left;font-size: 13px" placeholder="商品简介"></textarea>
                                    </label>
                                </div>
                                <div class="submit-shop">
                                    <input type="button" id="shop_but" style="border: none !important;" class="layui-btn layui-btn-normal" value="上传商品">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-items">
                    <div class="shop-name">
                        <form>
                            <div class="shop_add-width">
                                <div class="shop-add-border-margin">
                                    <div class="layui-upload">
                                        <button type="button" class="layui-btn layui-btn-normal" id="testList">请选择图片</button>
                                        <span class="num_pic"></span>
                                        <div class="layui-upload-list">
                                            <table class="layui-table">
                                                <thead>
                                                <tr>
                                                    <th>文件名</th>
                                                    <th id="pic">图片预览</th>
                                                    <th>大小</th>
                                                    <th>状态</th>
                                                    <th id="cao">操作</th>
                                                </tr>
                                                </thead>
                                                <tbody id="demoList"></tbody>
                                            </table>
                                        </div>
                                        <button type="button" class="layui-btn" id="testListAction">开始上传</button>
                                        <span class="num_pic"></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-items">
                    <form class="layui-form">
                        <div class="shop_add-width">
                            <div class="shop-add-border-margin">
                                <div class="shop-name">
                                    <span>添加商品类型：</span>
                                    <label class="classify-add">
                                        <input type="button" value="新增" class="layui-btn layui-btn-normal" style="border: none !important;" id="classify_add">
                                    </label>
                                    <table class="classify_const_array">
                                        <tr>
                                            <th width="329">商品类型</th>
                                            <th width="209">商品价格</th>
                                        </tr>
                                        <tr>
                                            <td style="padding: 10px !important;">
                                                <label>
                                                    <input type="text"  name="classify-const-ify[]" class="input-shop" style="width: 300px" placeholder="请输入商品类型">
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input type="text"  name="classify-const-money[]" class="input-shop" style="width: 200px" placeholder="请输入商品价格 /元">
                                                </label>
                                            </td>
                                            <td><input type="button" value="删除" class="layui-btn layui-btn-normal" style="border: none!important;" onclick="delete_classify(this)"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                    <label class="classify-add-but">
                        <input type="button" value="上传商品" class="layui-btn layui-btn-normal" style="!important;border: none !important;" id="classify_add-submit">
                    </label>
                </div>
                <div class="tab-items">
                    <div class="shop-name">
                        <form>
                            <div class="shop_add-width">
                                <div class="shop-add-border-margin">
                                    <div class="layui-upload">
                                        <button type="button" class="layui-btn layui-btn-normal" id="shop_pic_but">请选择图片</button>
                                        <span class="num_pic"></span>
                                        <div class="layui-upload-list">
                                            <table class="layui-table">
                                                <thead>
                                                <tr>
                                                    <th>文件名</th>
                                                    <th id="pic">图片预览</th>
                                                    <th>大小</th>
                                                    <th>状态</th>
                                                    <th id="cao">操作</th>
                                                </tr>
                                                </thead>
                                                <tbody id="picList"></tbody>
                                            </table>
                                        </div>
                                        <button type="button" class="layui-btn" id="shop_pic_Action">开始上传</button>
                                        <span class="num_pic"></span>
                                    </div>
                                </div>
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

    $('[name=news]').each(function (i, item) {
        if ($(item).val() == '0') {
            //更改选中值
            $(item).prop('checked', true);
            //重新渲染
            layui.use('form', function () {
                var form = layui.form;
                form.render();
            });
        }
    });
    $('[name=reCom]').each(function (i, item) {
        if ($(item).val() == '0') {
            //更改选中值
            $(item).prop('checked', true);
            //重新渲染
            layui.use('form', function () {
                var form = layui.form;
                form.render();
            });
        }
    });
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
    function delete_classify(id){
        $(id).parent().parent().remove();
    }
//    添加类型
$(function (){
    $('#classify_add').click(function (){
        $('.classify_const_array').append('<tr>\n' +
            '                                            <td style="padding: 10px !important;">\n' +
            '                                                <label>\n' +
            '                                                    <input type="text"  name="classify-const-ify[]" class="input-shop" style="width: 300px" placeholder="请输入商品类型">\n' +
            '                                                </label>\n' +
            '                                            </td>\n' +
            '                                            <td>\n' +
            '                                                <label>\n' +
            '                                                    <input type="text"  name="classify-const-money[]" class="input-shop" style="width: 200px" placeholder="请输入商品价格 /元">\n' +
            '                                                </label>\n' +
            '                                            </td>\n' +
            '                                        <td><input type="button" value="删除" class="layui-btn layui-btn-normal" style="border: none!important;" onclick="delete_classify(this)"></td></tr>');
    });
    $('#classify_add-submit').click(function (){
        var flag=true;
        var flag2=true;
        //判断输入框是否为空
        $('input[name*="classify-const-ify"]').each(function () {
            if ($(this).val() == "") {
                return flag=false;
            }
        });
        $('input[name*="classify-const-money"]').each(function () {
            if ($(this).val() == "") {
                return flag2=false;
            }
        });
        if (flag==true && flag2==true){
            var classify_classify={};
            $('input[name*="classify-const-ify"]').each(function (index){
                classify_classify[index]=$(this).val();
            });
            var classify_money={};
            $('input[name*="classify-const-money"]').each(function (index){
                classify_money[index]=$(this).val();
            });
            $.ajax({
                type:'post',
                url:'../Services/addProTypeServices.php',
                data:{'classify':classify_classify,'money':classify_money},
                dataType:'text',
                success:function (result){
                    if (result=="success"){
                        layer.msg('上传成功',{icon:1});
                    }
                    if (result=="error"){
                        layer.msg('请填写商品信息',{icon:0});
                    }
                },
            });
        }else{
            layer.msg('请将数据填写完整',{icon:0});
        }
    });
});

    //判断是否为空
    $(function (){
        //选项卡
        //点击ajax提交
        $("#shop_but").click(function (){
            var name=$('#name').val();
            if ( name==""||name==null){
                $('.display-name').removeAttr('style',"");
            } else {
                $('.display-name').addClass('dis-none');
            }
            if (name!="" && name!=null ){
                $.ajax({
                    type:"post",
                    url:"../Services/addShopServices.php",
                    data:{"name":name,"classify":$('#selectUser').val(),"news":$('input[name="news"]:checked').val(),"reCom":$('input[name="reCom"]:checked').val(),"remark":$("#remark").val()},
                    dataType:"text",
                    success:function (result){
                        if (result=="success"){
                            layer.msg('保存成功！',{icon:1});
                        }
                    }
                });
            }else {
                layer.msg('请完善当前商品的信息添加！',{icon:0});
            }
        });

    });
    layui.use(['upload','jquery'], function(){
        var $ = layui.$,
            upload = layui.upload;
        //多文件列表示例
        var demoListView = $('#demoList'),
            uploadListIns = upload.render({
                elem: '#testList',
                url: "../Services/addShopImgServices.php",
                accept: 'images',
                acceptMime: 'image/*',
                multiple: true,
                auto: false,
                number:4,
                exts: 'jpg|png|jpeg',
                bindAction: '#testListAction',
                choose: function (obj) {
                    var files = this.files = obj.pushFile(); //将每次选择的文件追加到文件队列
                    var arr = Object.keys(files);
                    console.log(arr.length);
                    //读取本地文件
                    obj.preview(function (index, file, result) {
                        if (arr.length <=4) {
                            var tr = $(['<tr id="upload-' + index + '">', '<td>' + file.name + '</td>', '<td><img src="' + result + '" alt="' + file.name + '" style="width: 300px !important;height: 60px;"></td>', '<td>' + (file.size / 1014).toFixed(1) + 'kb</td>', '<td>等待上传</td>', '<td>', '<button class="layui-btn layui-btn-xs demo-reload layui-hide">重传</button>', '<button class="layui-btn layui-btn-xs layui-btn-danger demo-delete">删除</button>', '</td>', '</tr>'].join(''));
                            //单个重传
                            tr.find('.demo-reload').on('click', function () {
                                obj.upload(index, file);
                                $("#upload-" + index).find("td").eq(2).html((file.size / 1014).toFixed(1) + 'kb');
                            });
                            //删除
                            tr.find('.demo-delete').on('click', function () {
                                delete files[index]; //删除对应的文件
                                tr.remove();
                                console.log(files);
                                uploadListIns.config.elem.next()[0].value = ''; //清空 input file 值，以免删除后出现同名文件不可选
                            });
                        }else {
                            layer.msg("单次上传图片不得超过4张");
                            delete files[index]; //删除对应的文件
                            console.log(files);
                            uploadListIns.config.elem.next()[0].value = ''; //清空 input file 值，以免删除后出现同名文件不可选
                        }
                        demoListView.append(tr);
                    });

                },
                done: function (res, index, upload) {
                    if (res.code == 0) { //上传成功
                        $("#cao").css('display',"none");
                        var tr = demoListView.find('tr#upload-' + index),
                            tds = tr.children();
                        tds.eq(3).html('<span style="color: #5FB878;">上传成功</span>');
                        tds.eq(4).css('display','none');
                        return delete this.files[index]; //删除文件队列已经上传成功的文件
                    }
                    this.error(index, upload);
                },
                allDone: function (obj) { //当文件全部被提交后，才触发
                    layer.msg("上传文件数量：【" + obj.total + "】张，上传成功：【" + obj.successful + "】张", {
                        time: 3000
                    });
                    // console.log(obj.total); //得到总文件数
                    //
                    // console.log(obj.successful); //请求成功的文件数
                    //
                    // console.log(obj.aborted); //请求失败的文件数
                },
                error: function (index, upload) {
                    var tr = demoListView.find('tr#upload-' + index),
                        tds = tr.children();
                    tds.eq(2).html('<span style="color: #FF5722;">上传失败</span>');
                    tds.eq(4).find('.demo-reload').removeClass('layui-hide'); //显示重传
                }
            });
        //多文件列表示例
        var ShopPicListView = $('#picList'),
            pic_uploadListIns = upload.render({
                elem: '#shop_pic_but',
                url: "../Services/addIntroServices.php",
                accept: 'images',
                acceptMime: 'image/*',
                multiple: true,
                auto: false,
                number:4,
                exts: 'jpg|png|jpeg',
                bindAction: '#shop_pic_Action',
                choose: function (obj) {
                    var files = this.files = obj.pushFile(); //将每次选择的文件追加到文件队列
                    var arr = Object.keys(files);
                    console.log(arr.length);
                    //读取本地文件
                    obj.preview(function (index, file, result) {
                        if (arr.length <=4) {
                            var tr = $(['<tr id="pic_upload-' + index + '">', '<td>' + file.name + '</td>', '<td><img src="' + result + '" alt="' + file.name + '" style="width: 300px !important;height: 60px;"></td>', '<td>' + (file.size / 1014).toFixed(1) + 'kb</td>', '<td>等待上传</td>', '<td>', '<button class="layui-btn layui-btn-xs demo-reload layui-hide" id="pic_reload">重传</button>', '<button class="layui-btn layui-btn-xs layui-btn-danger demo-delete" id="pic_delete">删除</button>', '</td>', '</tr>'].join(''));
                            //单个重传
                            tr.find('#pic_reload').on('click', function () {
                                obj.upload(index, file);
                                $("#pic_upload-" + index).find("td").eq(2).html((file.size / 1014).toFixed(1) + 'kb');
                            });
                            //删除
                            tr.find('#pic_delete').on('click', function () {
                                delete files[index]; //删除对应的文件
                                tr.remove();
                                console.log(files);
                                pic_uploadListIns.config.elem.next()[0].value = ''; //清空 input file 值，以免删除后出现同名文件不可选
                            });
                        }else {
                            layer.msg("单次上传图片不得超过4张");
                            delete files[index]; //删除对应的文件
                            console.log(files);
                            pic_uploadListIns.config.elem.next()[0].value = ''; //清空 input file 值，以免删除后出现同名文件不可选
                        }
                        ShopPicListView.append(tr);
                    });

                },
                done: function (res, index, upload) {
                    if (res.code == 0) { //上传成功
                        $("#cao").css('display',"none");
                        var tr = ShopPicListView.find('tr#pic_upload-' + index),
                            tds = tr.children();
                        tds.eq(3).html('<span style="color: #5FB878;">上传成功</span>');
                        tds.eq(4).css('display','none');
                        return delete this.files[index]; //删除文件队列已经上传成功的文件
                    }
                    this.error(index, upload);
                },
                allDone: function (obj) { //当文件全部被提交后，才触发
                    layer.msg("上传文件数量：【" + obj.total + "】张，上传成功：【" + obj.successful + "】张", {
                        time: 3000
                    });
                    // console.log(obj.total); //得到总文件数
                    //
                    // console.log(obj.successful); //请求成功的文件数
                    //
                    // console.log(obj.aborted); //请求失败的文件数
                },
                error: function (index, upload) {
                    var tr = ShopPicListView.find('tr#pic_upload-' + index),
                        tds = tr.children();
                    tds.eq(2).html('<span style="color: #FF5722;">上传失败</span>');
                    tds.eq(4).find('#pic_reload').removeClass('layui-hide'); //显示重传
                }
            });
    });
</script>
</html>