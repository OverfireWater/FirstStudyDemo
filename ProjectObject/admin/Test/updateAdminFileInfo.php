<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="renderer" content="webkit">
    <title></title>
    <link rel="stylesheet" href="../css/pintuer.css">
    <link rel="stylesheet" href="../css/admin.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/pintuer.js"></script>
    <script src="../js/jquery-1.8.3.min.js"></script>
    <style>
        .radio-checked {
            display: flex;
            align-items: center;
            height: 44px;
        }

        .radio-checked input {
            display: none;
        }

        .radio-checked input + span {
            display: inline-block;
            width: 50px;
            line-height: 45px;
            border-radius: 4px;
            background-color: #dddddd22;
            text-align: center;
            font-size: 14px;
            border: 1px solid #ddd;
        }

        .radio-checked input:checked + span {
            color: #1aa1e4;
            border: 1px solid #1aa1e4;
            background-color: #1aa1e411;
            transition: all 0.5s;
        }
        .super-radio-checked {
            display: flex;
            align-items: center;
            height: 44px;
        }

        .super-radio-checked input {
            display: none;
        }

        .super-radio-checked input + span {
            display: inline-block;
            width: 50px;
            line-height: 45px;
            border-radius: 4px;
            background-color: #dddddd22;
            text-align: center;
            font-size: 14px;
            border: 1px solid #ddd;
        }

        .super-radio-checked input:checked + span {
            color: #1aa1e4;
            border: 1px solid #1aa1e4;
            background-color: #1aa1e411;
            transition: all 0.5s;
        }
    </style>
    <style>
        .div1{
            width: 100px;
            height: 30px;
            border-radius: 15px;
            overflow: hidden;
            position: relative;
        }
        .div1 .left{
            position: absolute;
            left:4px;
        }
        .div1 .right{
            position: absolute;
            right:4px;
        }
        .div2{
            width: 50px;
            height: 24px;
            border-radius: 20px;
            background: #fff;
            position: absolute;
        }
        .open1{
            background: #00aaee;
            transition: all 0.5s;
        }
        .open2{
            top: 3px;
            left: 5px;
            transition: all 0.5s;
        }
        .close1{
            width: 100px;
            height: 30px;
            border-radius: 15px;
            overflow: hidden;
            position: relative;
            background: #888888;
            transition: all 0.7s;
        }
        .close2{
            left: 45px;
            top: 3px;
            transition: all 0.7s;
        }
    </style>
    <script>
        <?php
        include "../DB/DBhelper.php";
        $DB = new DBhelper();
        if ($_GET) {
            $id = $_GET['id'];
        }
        $sql = "select adminfileInfo.* ,admininfo.username as username from adminfileInfo,admininfo where adminfileInfo.uid=admininfo.id and adminfileInfo.id=" . $id;
        $arr = $DB->fileInfo_to_obj($sql);
        if (count($arr) > 0) {
            $file = $arr[0];
        }
        ?>
    </script>
    <script>
        function getDate() {
            var date = new Date();
            var Y = date.getFullYear() + "-";
            var M = date.getMonth() + 1 + "-";
            var D = date.getDate() + " ";
            var H = date.getHours() + ":";
            if (date.getMinutes() < 10) {
                var m = "0" + date.getMinutes() + ":";
            } else {
                var m = date.getMinutes() + ":";
            }
            if (date.getSeconds() < 10) {
                var s = "0" + date.getSeconds();
            } else {
                var s = date.getSeconds();
            }
            document.getElementById('date').value = Y + M + D + H + m + s;
        }

        setInterval('getDate()', 1000);
        //滑动按钮
        $(function(){
            $(".div2").on('click',function() {
                var class_id=($("#div2").attr("class"));
                if (class_id=="div2 open2"){

                    ($("#div1").attr("class","div1 close1"));
                    ($("#div2").attr("class","div2 close2"));
                    $("#span1").css("display","block");
                    $("#span2").css("display","none");
                }else {
                    ($("#div1").attr("class","div1 open1"));
                    ($("#div2").attr("class","div2 open2"));
                    $("#span1").css("display","none");
                    $("#span2").css("display","block");
                }
            })
        });

        $(function (){
            var id=<?=$id?>;
            var file_name=$("#file_name").val();
            $("#submit").click(function (){
                var class_id=($("#div2").attr("class"));
                if (class_id=="div2 open2"){
                    var status=1;
                }else {
                    var status=0;
                }
                $.ajax({
                    url:"../Services/updateAdminFileInfoServices.php?id="+id+"&status="+status+"&filename="+file_name,
                    success:function (result){
                        if (result=="success"){
                        alert('修改成功');
                        window.location.href='adminfileInfo.php';
                        }else {
                            alert('修改失败');
                            history.back();
                        }
                    },
                    error:function (){
                        alert('数据错误');
                    }
                })
            });
        });


    </script>
</head>
<body onload="getDate()">
<div class="panel admin-panel">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>修改内容</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" >
            <div class="form-group">
                <div class="label">
                    <label>ID：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="<?= $id ?>" name="id" readonly="readonly"/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>所属用户：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="<?= $file->getNickname() ?>" name="name" readonly="readonly" />
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>文件路径：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" id="file_name" name="filetype" value="<?= $file->getFilename() ?>" readonly="readonly"/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>修改时间：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" id="date" name="date" readonly="readonly"/>
                    <div class="tips"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>文件状态：</label>
                </div>
                <div id="div1" class="div1 open1">
                    <span id="span1" class="left" style="display: none;line-height: 24px;margin-left: 4px">异常</span>
                    <span id="span2" class="right" style="line-height: 24px;margin-right: 4px">正常</span>
                    <div id="div2" class="div2 open2"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    <button class="button bg-main icon-check-square-o" id="submit" type="button"> 提交</button>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>