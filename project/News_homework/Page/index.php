
<html>
<meta charset="utf-8"/>
<head>
    <?php
    include "../Entily/UserInfo.php";
   session_start();
    $user=null;

    if ($_SESSION['user']==null){

        echo "<script>window.location.href='login.php';</script>";
    }else{
        $user=$_SESSION['user'];
    }


    ?>

    <style type="text/css">
        a {
            text-decoration: none;

        }

        a:link {
            color: #2aa198;
        }

        a:hover {
            color: #00F7DE;
        }

        .hovertable {
            width: 1050px;
            font-family: verdana, arial, sans-serif;
            font-size: 11px;
            color: black;
            border-width: 1px;
            border-color: #999999;
            border-collapse: collapse;
        }

        .hovertable th {
            background-color: grey;
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: black;
            height: 50px;
        }

        .hovertable tr {
            background-color: darkgrey;
        }

        .hovertable td {

            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: black;
            text-align: center;
            height: 30px;
        }

        .news_type{
            text-align: center;
            margin-top: 60px;
        }
        .news_type input{
            font-size: 20px;
        }
        .newsinfo_delete{
            padding-top: 100px;
            padding-left: 230px;
        }
    </style>

    <!-- Table goes in the document BODY -->
    <script>
        function refs() {
            window.location.reload();

        }
        function move_news(){
            window.location.href="../NewsType/news_type_index.php";
        }

    </script>
</head>
<body>
<center>

    <h2>欢迎用户<?=$user->getUname()?>登录</h2>
    <!-- CSS goes in the document HEAD or added to your external stylesheet -->
    <table class="hovertable">
        <h2>新闻信息表</h2>
        <tr>
            <td colspan="7">
                <form action="index.php" method="post">
                    <input type="text" name="name" placeholder="搜索新闻类型或标题"
                           style="border: 1px solid;background-color: darkgrey">
                    <input type="submit" value="search" style="border-width: 1px; border-style: solid">
                    <input type="button" id="ref" value="flush" style="border-width: 1px; border-style: solid"
                           onclick="refs()">
                </form>
            </td>
        </tr>
        <tr>
            <th>
                编号
            </th>
            <th>
                新闻标题
            </th>
            <th>
                新闻内容
            </th>
            <th>
                发行时间
            </th>
            <th>
                类型编号
            </th>

            <th>
                操作
            </th>
        </tr>

        <?php
        include "../DB/DBhelper.php";
        include "../Entily/PageInfo.php";
        $db = new DBhelper();
        $arr_obj = null;
        //搜索，，获取POST
        if ($_POST) {
            $name = $_POST['name'];

            //查询新闻类型表的类型
            $sql_type="select * from newstype where news_type like '%".$name."%' ";
            //获取新闻类型的id
            $arr_type=$db->query_date($sql_type);
            if($arr_type!=null){
                $arr_type=$arr_type[0][0];
            }

                //分页查询加搜索
                $sql = "select count( * ) from NewsInfo";
                $count = $db->query_date($sql);
                $pageCount = $count[0][0];
                $pageNum = 1;
                $pageSize = 5;
                if ($_GET['Num']) {
                    $pageNum = $_GET['Num'];
                }
                $num = ($pageNum - 1) * $pageSize;
                $sql1 = "select * from newsinfo where news_title like '%" . $name . "%' or news_type like '%".$arr_type."%' limit ".$num.", ".$pageSize;
                $pageDate = $db->arr_to_obj($sql1);
                $page = new PageInfo($pageNum, $pageSize, $pageCount, $pageDate);
                $arr_obj = $page->pageDate;
        }
        else {
            $sql = "select count( * ) from NewsInfo";
            $count = $db->query_date($sql);
            $pageCount = $count[0][0];

            $pageNum = 1;
            $pageSize = 5;
            if ($_GET['Num']) {
                $pageNum = $_GET['Num'];
            }

            $num = ($pageNum - 1) * $pageSize;
            $sql = "select * from NewsInfo limit " . $num . "," . $pageSize;
            $pageDate = $db->arr_to_obj($sql);
            $page = new PageInfo($pageNum, $pageSize, $pageCount, $pageDate);
            $arr_obj = $page->pageDate;
        }

        if ($arr_obj != null){
        for ($i = 0;$i < count($arr_obj);$i++){
            $bk = $arr_obj[$i];
        ?>

        <tr onmouseover="this.style.backgroundColor='#3F3F3F';" onmouseout="this.style.backgroundColor='darkgrey';">
            <td>
                <?= $bk->getNewsId() ?>
            </td>
            <td>
                <?= $bk->getNewsTitle() ?>
            </td>
            <td>
                <?=strlen($bk->getNewsContent())>10?substr($bk->getNewsContent(),0,12)."...":  $bk->getNewsContent() ?>
            </td>
            <td>
                <?= $bk->getNewsDate() ?>
            </td>

            <td>
                <?=$bk->getNewsType() ?>
            </td>
            <td>
                <a href="../Services/delete.php?news_id=<?=$bk->getNewsID()?>">删除</a>
                &nbsp;&nbsp;&nbsp;
                <a href="../ADD/update.php?news_id=<?=$bk->getNewsID()?>">修改</a>
            </td>

            <?php
            }
            } else {
                ?>
                <td colspan="7" style="font-size: 18px">没有该商品</td>
                <?php
            }
            ?>
        </tr>

    </table>
    <!--    第十步，将上一页和下一页写入-->

    <a href="index.php?Num=<?= $page->upPage()?>"><input type="button" value="上一页" style="margin-top: 20px"></a>
    当前<?=$page->pageNum?>页，一共<?=$page->getPageCount()?>页
    <a href="index.php?Num=<?= $page->nextPage()?>"><input type="button" value="下一页" style="margin-top: 20px"></a>
    <br>
    <a href="../ADD/Add.html"><input type="button" value="添加" style="margin-top: 20px;"></a>
</center>
<div class="news_type">
    <input type="button" id="move_news" value="点击查看新闻类型表" onclick="move_news()">
</div>
<div class="newsinfo_delete">
    <form action="../Services/news_all_delete.php" method="post">
        <input type="submit" name="delete" value="点击有惊喜">
    </form>
</div>
</body>
</html>


