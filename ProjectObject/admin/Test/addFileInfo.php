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
    <script>
        <?php
        include "../DB/DBhelper.php";
        session_start();
        $DB = new DBhelper();
        if ($_GET) {
            $id = $_GET['id'];
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
    </script>
    <script>
        $(function (){
            $("#image1").click(function (){
                $("#file").trigger('click');
            });
        });
        function changFile(i){
            var file=$("#file").val();
            if (file!=null){
                document.getElementById('file_text').value=file;
            }else {
                document.getElementById('file_name').clear();
            }

        }
    </script>
</head>
<body onload="getDate()">
<div class="panel admin-panel">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加文件</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="addFileInfoServices.php" enctype="multipart/form-data">
            <div class="form-group">
                <div class="label">
                    <label>所属用户：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="<?= $_SESSION['username'] ?>" name="name" readonly="readonly" />
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>添加文件：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" id="file_text" readonly="readonly" />
                    <input type="button" class="button bg-blue" id="image1" value="+上传"  style="float:left;" >
                    <input type="file" id="file" name="file"  style="display: none" onchange="changFile(this)">
                </div>
                </div>
            <div class="form-group">
                <div class="label">
                    <label>添加时间：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" id="date" name="date" readonly="readonly"/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>