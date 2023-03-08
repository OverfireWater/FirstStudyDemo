<html>
<meta charset="utf-8"/>
<head>
    <?php
    session_start();
    $user=null;
    if ($_SESSION['user']==null){
        echo "<script>window.location.href='login.php'</script>>";
    }
    else{
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
        <tr>
            <td colspan="8">
                <form action="index.php" method="post">
                    <input type="text" name="name" placeholder="搜索图书名称"
                           style="border: 1px solid;background-color: darkgrey">
                    <input type="submit" value="search" style="border-width: 1px; border-style: solid">
                    <input type="button" id="ref" value="flush" style="border-width: 1px; border-style: solid"
                           onclick="refs()">
                </form>
            </td>
        </tr>
        <tr>
            <th>
                图书封面
            </th>
            <th>
                图书编号
            </th>
            <th>
                图书名称
            </th>
            <th>
                作者
            </th>
            <th>
                发行时间
            </th>
            <th>
                简介
            </th>
            <th>
                备注
            </th>
            <th>
                操作
            </th>
        </tr>

        <?php
        include "../DB/DBhelper.php";
        include "../Enter/PageInfo.php";
        $db = new DBhelper();
        $arr_obj = null;
        //搜索，，获取POST
        if ($_POST) {
            $name = $_POST['name'];

            $count = $db->quary_date_count();
            $count = $count[0][0];
            //第三步，获取页码
            $pageNum = 1;
            //第七步，获取上一页或下一页的GET
            if ($_GET['pageNum']) {
                $pageNum = $_GET['pageNum'];
            }
            //第四步，获取每页需要展示的数据
            $pageSize = 3;
            //第五步，获取之后填入sql语句
            $num = ($pageNum - 1) * $pageSize;

            //第一步，获取分页
            $sql = "select * from bookinfo where book_name like '%" . $name . "%' group by book_id asc  limit " . $num . "," . $pageSize;
            $arr_date = $db->arr_to_obj($sql);
            //创建页面对象，获取PageInfo里面的对应属性
            //第八步，将获取到的属性，一一填入到页码对象中
            $pageInfo = new PageInfo($pageNum, $pageSize, $count, $arr_date);
            //第九步，从PageInfo里面获取改页码的数组
            $arr_obj = $pageInfo->pageDate;
        } else {


//            //如果没有数据传输，就查询BookInfo
//            $sql = "select * from bookinfo";
//            $arr_obj = $db->arr_to_obj($sql);


            //分页展示
            //第六步，获取总行数
            $count = $db->quary_date_count();
            $count = $count[0][0];
            //第三步，获取页码
            $pageNum = 1;
            //第七步，获取上一页或下一页的GET
            if ($_GET['pageNum']) {
                $pageNum = $_GET['pageNum'];
            }
            //第四步，获取每页需要展示的数据
            $pageSize = 3;
            //第五步，获取之后填入sql语句
            $num = ($pageNum - 1) * $pageSize;

            //第一步，获取分页
            $sql = "select * from bookinfo group by book_id asc  limit " . $num . "," . $pageSize;
            $arr_date = $db->arr_to_obj($sql);
            //创建页面对象，获取PageInfo里面的对应属性
            //第八步，将获取到的属性，一一填入到页码对象中
            $pageInfo = new PageInfo($pageNum, $pageSize, $count, $arr_date);
            //第九步，从PageInfo里面获取改页码的数组
            $arr_obj = $pageInfo->pageDate;
        }
        if ($arr_obj != null){
        for ($i = 0;
        $i < count($arr_obj);
        $i++){
        $bk = $arr_obj[$i];
        ?>

        <tr onmouseover="this.style.backgroundColor='#3F3F3F';" onmouseout="this.style.backgroundColor='darkgrey';">
            <td>
                <img width="30px" height="50px" src="<?= $bk->getBookImg() ?>">
            </td>
            <td>
                <?= $bk->getBookId() ?>
            </td>
            <td>
                <?= $bk->getBookName() ?>
            </td>
            <td>
                <?= $bk->getBookAuthor() ?>
            </td>
            <td>
                <?= $bk->getBookDate() ?>
            </td>
            <td>
                <?= strlen($bk->getBookIntro()) > 10 ? substr($bk->getBookIntro(), 0, 12) . "..." : $bk->getBookIntro() ?>
            </td>
            <td>
                <?= $bk->getRemark() ?>
            </td>
            <td>
                <a href="../Services/delete.php?book_id=<?= $bk->getBookId() ?>">删除</a>
                &nbsp;&nbsp;&nbsp;
                <a href="../Add/update.php?book_id=<?= $bk->getBookId() ?>">修改</a>
            </td>

            <?php
            }
            } else {
                ?>
                <td colspan="8" style="font-size: 18px">没有该商品</td>
                <?php
            }
            ?>
        </tr>

    </table>
    <!--    第十步，将上一页和下一页写入-->
    <a href="index.php?pageNum=<?= $pageInfo->upPage() ?>"><input type="button" value="上一页"
                                                                  style="margin-top: 20px"></a>
    当前<?= $pageInfo->pageNum ?>页，一共<?= ceil($pageInfo->getPageCount()) ?>页
    <a href="index.php?pageNum=<?= $pageInfo->nextPage() ?>"><input type="button" value="下一页" style="margin-top: 20px"></a>
    <br>
    <a href="../Add/Add.php"><input type="button" value="添加" style="margin-top: 20px;"></a>
</center>
</body>
</html>


