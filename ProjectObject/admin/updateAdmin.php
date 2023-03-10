<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="renderer" content="webkit">
    <title></title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
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
    <?php
    include "../DB/DBhelper.php";
    session_start();
    $DB = new DBhelper();
    $name=$_SESSION['adminname'];
    $pwd=$_SESSION['adminpwd'];
    $id=$_SESSION['adminid'];
    $password_arr=$DB->queryData("select * from adminInfo where username='".$name."' and userpwd='".$pwd."'");
    if ($password_arr==null) {
        echo "<script>alert('???????????????????????????????????????')</script>";
        //?????????????????????????????????????????????????????????????????????
        $_SESSION['adminname']=null;
        $_SESSION['adminpwd']=null;
        session_destroy();
        if ($_SESSION['adminname']==null && $_SESSION['adminpwd']==null){
            echo "<script>window.location.href='login.html'</script>>";
        }
    }else{
        $username=$_SESSION['adminname'];
    }
    ?>
    <script>
        <?php

        if ($_GET) {
            $id = $_GET['id'];
        }
        $sql = "select * from adminInfo where id=" . $id;
        $arr = $DB->admininfo_to_obj($sql);
        if (count($arr) > 0) {
            $admin = $arr[0];
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

        function Status() {
            var status = "<?=$admin->getUserstatus()?>";
            if (status == "1") {
                $("[name='status'][value='0']").removeAttr('checked');
                $("[name='status'][value='1']").prop("checked", "checked");
            }
        }

        function Super() {
            var Super = "<?=$admin->getIssuper()?>";
            if (Super == "1") {
                $("[name='super'][value='0']").removeAttr('checked');
                $("[name='super'][value='1']").prop("checked", "checked");
            }
        }
    </script>
</head>
<body onload="Status();getDate();Super()">
<div class="panel admin-panel">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>????????????</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="../Services/updateAdminServices.php">
            <div class="form-group">
                <div class="label">
                    <label>?????????</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="<?= $id ?>" name="id" readonly="readonly"/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>??????????????????</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="<?= $admin->getUsername() ?>" name="name"
                           readonly="readonly" data-validate="required:????????????????????????"/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>???????????????</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="telphone" value="<?= $admin->getTelphone() ?>"
                           data-validate="required:?????????????????????"/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>???????????????</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" id="date" name="date" readonly="readonly"/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>?????????</label>
                </div>
                <div class="radio-checked">
                    <label for="wu">
                        <input name="status" id="wu" type="radio" value="0" checked="checked">
                        <span>??????</span>
                    </label>
                    <label for="you">
                        <input name="status" id="you" type="radio" value="1">
                        <span>??????</span>
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>???????????????????????????</label>
                </div>
                <div class="super-radio-checked">
                    <label for="no">
                        <input name="super" id="no" type="radio" value="0" checked="checked">
                        <span>???</span>
                    </label>
                    <label for="yes">
                        <input name="super" id="yes" type="radio" value="1">
                        <span>???</span>
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    <button class="button bg-main icon-check-square-o" type="submit"> ??????</button>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>