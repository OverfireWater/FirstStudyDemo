<html>
<meta charset="utf-8"/>
<head>

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
            margin-top: 30px;
        }
        .news_type input{
            font-size: 20px;
        }
    </style>

    <!-- Table goes in the document BODY -->
    <script>
        function refs() {
            window.location.reload();

        }

    </script>
</head>
<body>
<center>


    <!-- CSS goes in the document HEAD or added to your external stylesheet -->
    <table class="hovertable">
        <h2>新闻类型表</h2>
        <tr>
            <td colspan="7">
                <form action="news_type_index.php" method="post">
                    <input type="text" name="type" placeholder="搜索新闻类型"
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
                新闻类型
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
            $type = $_POST['type'];
                //分页查询加搜索
                $sql = "select count( * ) from newstype";
                $count = $db->query_date($sql);
                $pageCount = $count[0][0];
                $pageNum = 1;
                $pageSize = 5;
                if ($_GET['pageNum']) {
                    $pageNum = $_GET['pageNum'];
                }
                $num = ($pageNum - 1) * $pageSize;
                $sql1 = "select * from newstype  where news_type like '%" . $type . "%' group by news_id asc limit ".$num.", ".$pageSize;
                $pageDate = $db->news_type_obj($sql1);
                $page = new PageInfo($pageNum, $pageSize, $pageCount, $pageDate);
                $arr_obj = $page->pageDate;
        }
        else {
            $sql = "select count( * ) from newstype";
            $count = $db->query_date($sql);
            $pageCount = $count[0][0];
            $pageNum = 1;
            $pageSize = 5;
            if ($_GET['pageNum']) {
                $pageNum = $_GET['pageNum'];
            }

            $num = ($pageNum - 1) * $pageSize;
            $sql = "select * from newstype group by news_id asc limit " . $num . "," . $pageSize;
            $pageDate = $db->news_type_obj($sql);
            $page = new PageInfo($pageNum, $pageSize, $pageCount, $pageDate);
            $arr_obj = $page->pageDate;
        }

        if ($arr_obj != null){
        for ($i = 0;$i < count($arr_obj);$i++){
            $bk = $arr_obj[$i];
        ?>

        <tr onmouseover="this.style.backgroundColor='#3F3F3F';" onmouseout="this.style.backgroundColor='darkgrey';">
            <td>
                <?= $bk->getNewsTypeId() ?>
            </td>
            <td>
                <?= $bk->getNewsTypeType() ?>
            </td>

            <td>
                <a href="../News_Type_Services/News_type_delete.php?news_id=<?=$bk->getNewsTypeId()?>">删除</a>
                &nbsp;&nbsp;&nbsp;
                <a href="../News_Type_Add/update.php?news_id=<?=$bk->getNewsTypeId()?>">修改</a>
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

    <a href="news_type_index.php?pageNum=<?= $page->upPage()?>"><input type="button" value="上一页" style="margin-top: 20px"></a>
    当前<?=$page->pageNum?>页，一共<?=$page->getPageCount()?>页
    <a href="news_type_index.php?pageNum=<?= $page->nextPage()?>"><input type="button" value="下一页" style="margin-top: 20px"></a>
    <br>
    <a href="../News_Type_Add/Add.html"><input type="button" value="添加" style="margin-top: 20px;"></a>
</center>
<div class="news_type">
    <a href="../Page/index.php"><input type="button" name="move_news" value="点击返回新闻信息表"></a>
</div>
</body>
</html>


