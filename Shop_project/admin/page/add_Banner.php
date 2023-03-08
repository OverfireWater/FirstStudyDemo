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
        #Shop_pic{
            background-color: #1aa1e4;
            color: white;
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
                    <li id="Shop_pic">轮播图添加</li>
                </ul>
            </div>
            <div class="tab-con">
                <div class="tab-items con-active">
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
            </div>
        </div>
    </div>
</div>
</body>
<script src="js/jquery-1.8.3.min.js"></script>
<script src="../layui/layui.js"></script>
<script>
    layui.use(['upload','jquery'], function(){
        var $ = layui.$,
            upload = layui.upload;
        //多文件列表示例
        var demoListView = $('#demoList'),
            uploadListIns = upload.render({
                elem: '#testList',
                url: "../Services/bannerServices.php",
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
                    }if (res.code==1){
                        this.error(index, upload);
                    }
                    if (res.code==2){
                        layer.msg('该图片已存在！',{icon:0});
                        this.error(index, upload);
                    }
                },
                allDone: function (obj) { //当文件全部被提交后，才触发
                    // layer.msg("上传文件数量：【" + obj.total + "】张，上传成功：【" + obj.successful + "】张", {
                    //     time: 3000
                    // });
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
    });
</script>
</html>