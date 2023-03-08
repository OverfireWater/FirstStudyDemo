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
    <script src="../js/jquery.js"></script>
    <script src="../js/pintuer.js"></script>
    <script src="../js/jquery-1.8.3.min.js"></script>
</head>
<?php
include "../DB/DBhelper.php";
include "../Entily/pageInfo.php";
session_start();
$DB = new DBhelper();
$pageModel = new pageInfo();

if ($_GET['keywords'] ) {
    $keywords = $_GET['keywords'];
    $arr = $DB->queryData("select count(*) as id from fileInfo where uid='" . $_SESSION['id'] . "' and truename like '%".$keywords."%' ");
    $Count = $arr[0]['id'];
    $pageModel->setCount($Count);
    $pageNum = 1;
    $pageModel->setPageNum($pageNum);
    if ($_GET['pageNum']) {
        $pageNum = $_GET['pageNum'];
        $pageModel->setPageNum($pageNum);
    }
    $pageSize = 6;
    $pageModel->setPageSize($pageSize);
    $pageArr = $DB->fileInfo_to_obj("select fileInfo.* ,userInfo.username as username from fileInfo,userInfo  
where fileInfo.uid=userInfo.id and truename like '%" . $keywords . "%' and username='" . $_SESSION['username'] . "' limit " . ($pageModel->getPageNum() - 1) * $pageModel->getPageSize() . "," . $pageModel->getPageSize());
}
else {
    $arr = $DB->queryData("select count(*) as id from fileInfo where uid='" . $_SESSION['id'] . "' ");
    $Count = $arr[0]['id'];
    $pageModel->setCount($Count);
    $pageNum = 1;
    $pageModel->setPageNum($pageNum);
    if ($_GET['pageNum']) {
        $pageNum = $_GET['pageNum'];
        $pageModel->setPageNum($pageNum);
    }
    $pageSize = 3;
    $pageModel->setPageSize($pageSize);
    $pageArr = $DB->fileInfo_to_obj("select fileInfo.* ,userInfo.username as username from fileInfo,userInfo
where fileInfo.uid=userInfo.id and username='" . $_SESSION['username'] . "' limit " . ($pageModel->getPageNum() - 1) * $pageModel->getPageSize() . "," . $pageModel->getPageSize());
}
if ($pageArr > 0) {
    $pageModel->setPageData($pageArr);
}
?>
<?php
$name = $_SESSION['username'];
$pwd = $_SESSION['userpwd'];
$id = $_SESSION['id'];
$status = 0;
$password_arr = $DB->queryData("select * from userInfo where username='" . $name . "' and userpwd='" . $pwd . "'");
$user_pic = $password_arr[0]['userpic'];
$user_nickname = $password_arr[0]['nickname'];
if ($password_arr == null) {
    echo "<script>alert('账号密码已过期，请重新登录')</script>";
    $_SESSION['username'] = null;
    $_SESSION['userpwd'] = null;
    session_destroy();
    echo "<script>window.location.href='login.php'</script>>";
}
?>
<script>
    $(function () {
        $("#search").click(function () {
            var act = "fileInfo.php";
            $("#form_Bulk_search").attr("action", act).attr("method","get").submit();
        });

        $("#download").click(function () {
            var act = "../Services/BulkdownloadFile.php";
            $("#form_Bulk_search").attr("action", act).attr("method","post").submit();
        });
        $("#but_up_file").click(function () {
            var act = "../Services/addFileInfoServices.php";
            $("#form_Bulk_search").attr("action", act).attr("method","post").submit();
        });
    });

    function delete_file_bulk() {
        var flag = confirm('您确定要删除吗？');
        if (flag) {
            var act = "../Services/BulkdeletefileInfo.php";
            $("#form_Bulk_search").attr("action", act).attr("method","post").submit();
        }
    }

    $(function () {
        $("#button_upfile").click(function () {
            $("#file").trigger('click');
        });
    });

    function changFile(i) {
        var file = $("#file").val();
        var file_name = file.split('\\')[2];
        if (file != null) {

            document.getElementById('file_text').innerText = file_name;
        } else {
            document.getElementById('file_text').clear();
        }
    }
</script>
<body>
<form  id="form_Bulk_search" enctype="multipart/form-data">
    <div class="panel admin-panel">
        <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
        <div class="padding ">
            <ul class="search" style="padding-left:10px;">
                <li><a class="button border-main icon-plus-square-o" id="button_upfile" style="cursor: pointer;">
                        上传文件</a></li>
                <li><span id="file_text" style="font-size: 16px"></span></li>
                <li>
                    <div class="field">
                        <button class="button bg-main icon-check-square-o" id="but_up_file" type="submit"> 提交</button>
                    </div>
                </li>
                <li><input type="file" id="file" name="file" style="display: none" onchange="changFile(this)"></li>
                <li style="float:right;padding-right: 100px">
                    <input type="text" placeholder="请输入搜索关键字,文件名称" name="keywords" class="input"
                           style="width:250px; line-height:17px;display:inline-block"/>
                    <a id="search" href="javascript:void(0)" class="button border-main icon-search"> 搜索</a>
                </li>
            </ul>
        </div>
        <table class="table table-hover text-center">
            <tr>
                <th style="text-align:left; padding-left:20px;"></th>
                <th width="50"></th>
                <th style="text-align: left">文件名称</th>
                <th>大小</th>
                <th>添加时间</th>
                <th>操作</th>
            </tr>
            <volist name="list" id="vo">
                <?php
                $data = $pageModel->getPageData();
                if ($data != null) {
                    for ($i = 0; $i < count($data); $i++) {
                        $pageData = $data[$i];
                        if ($pageData->getFilesize() != null) {
                            $filesize = $pageData->getFilesize() . "kb";
                        } else {
                            $filesize = $pageData->getFilesize();
                        }
                        $pageData->getFilesize();
                        $flie_type = $pageData->getTruename();
                        $sub_name = substr($flie_type, strripos($flie_type, ".") + 1);
                        $sub_name = urlencode($sub_name);
                        $img_type = '../icon/pic/' . $sub_name . '.jpg';
                        if (!file_exists($img_type)) {
                            $img_type = '../icon/pic/exe.jpg';
                        }
                        ?>
                        <tr>
                            <td style="text-align:left; padding-left:20px;"><input type="checkbox" name="file_id[]" value="<?= $pageData->getId() ?>"/>
                            </td>
                            <td>
                                <div><img id="src-filetype" height="25" src="<?= $img_type ?>"></div>
                            </td>
                            <td><span style="float:left; line-height: 25px">&nbsp;<?= $pageData->getTruename() ?></span>
                            </td>
                            <td><?= $filesize ?></td>
                            <td><?= $pageData->getAddtime() ?></td>
                            <td>
                                <div class="button-group">
                                    <a class="button border-main" style="margin-right: 20px" href="javascript:void(0)"
                                       onclick="return down_load_file(<?= $pageData->getFilestatus() ?>,<?= $pageData->getId() ?>)">
                                        <span class="icon-edit"></span> 下载</a>
                                    <a class="button border-red" href="javascript:void(0)"
                                       onclick="return del(<?= $pageData->getId() ?>)">
                                        <span class="icon-trash-o"></span> 删除</a>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                }

                ?>
                <tr>
                    <td style="text-align:left; padding:20px 0;padding-left:20px;"><input type="checkbox" id="checkall" onclick="Checked()"/>全选
                    </td>
                    <td colspan="9" style="text-align:left;padding-left:20px;">
                        <a id="download" href="javascript:void(0)" class="button border-main icon-edit"
                           style="padding:5px 15px;"> 批量下载</a>
                        <a id="delete" href="javascript:void(0)" class="button border-red icon-trash-o"
                           style="padding:5px 15px;margin-left: 20px" onclick="delete_file_bulk()"> 批量删除</a>
                    </td>
                </tr>
            </volist>
        </table>
    </div>
    <td colspan="10">
        <div class="pagelist">
            <a href="fileInfo.php?<?= $pageModel->getPageNum(1) ?>&& keywords=<?=$keywords?>">首页</a>
            <a href="fileInfo.php?pageNum=<?= $pageModel->upPage() ?>&& keywords=<?=$keywords?>">上一页</a>
            <span>当前页为第<?= $pageModel->getPageNum() ?>页</span>
            <span>总共<?= $pageModel->getDataCount() ?>页</span>
            <a href="fileInfo.php?pageNum=<?= $pageModel->nextPage() ?>&& keywords=<?=$keywords?>">下一页</a>
            <a href="fileInfo.php?pageNum=<?= $pageModel->getDataCount() ?>&& keywords=<?=$keywords?>"">尾页</a>
            <input id="Num" onkeyup="this.value=this.value.replace(/\D/g,'')"
                   onafterpaste="this.value=this.value.replace(/\D/g,'')"
                   oninput="if(value<=0)value=1;if(value.length>4)value=value.slice(0,4)" name="textfield" type="number"
                   min="1" step="1" size="10"/>
            <a href="javascript:void(0) " onclick="goto()">转到</a>
        </div>
    </td>
</form>
<script type="text/javascript">
    function down_load_file(status, id) {
        if (status == 1) {
            window.location.href = '../Services/downloadFile.php?id=' + id;
        } else {
            alert('抱歉，你选择的文件有违规，请重新选择下载！');
        }
    }

    function goto() {
        var num = document.getElementById('Num').value;
        var keywords="<?=$keywords?>";
        if (num > <?=$pageModel->getDataCount()?>) {
            alert("Data cannot be empty");
            document.getElementById('Num').value = "";
        } else {
            window.location.href = 'fileInfo.php?pageNum='+num+'&&keywords='+keywords;
        }
    }

    //全选和取消全选
    var Checked_all = false;

    function Checked() {
        if (Checked_all) {
            $("input[type='checkbox']").each(function () {
                this.checked = false;
            });
            Checked_all = false;
        } else {
            $("input[type='checkbox']").each(function () {
                this.checked = true;
            });
            Checked_all = true;
        }
    }

    //单个删除
    function del(id) {
        var flag = confirm("您确定要删除吗?");
        if (flag) {
            window.location.href = '../Services/deleteFileServices.php?id=' + id;
        }
    }


</script>
</body>
</html>