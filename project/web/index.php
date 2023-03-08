<html>

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
            <td colspan="7">
                <form action="index.php" method="post">
                    <input type="text" name="name" placeholder="搜索图书名称" style="border: 1px solid;background-color: darkgrey" >
                    <input type="submit" value="search" style="border-width: 1px; border-style: solid">
                    <input type="button" id="ref" value="flush" style="border-width: 1px; border-style: solid"
                           onclick="refs()">
                </form>
            </td>
        </tr>
        <tr>
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
        include "pro/DBhelper.php";
        $db = new DBhelper();
        $arr_obj = null;
        //搜索，，获取POST
        if ($_POST) {
            $name=$_POST['name'];
            $sql="select * from bookinfo where book_name like '%".$name."%'";
            $arr_obj=$db->arr_to_obj($sql);
        }
        else{
            //如果没有数据传输，就查询BookInfo
            $sql = "select * from bookinfo";
            $arr_obj = $db->arr_to_obj($sql);
        }
        if($arr_obj!=null){
            for ($i = 0;$i < count($arr_obj);$i++){
                $bk = $arr_obj[$i];
        ?>

        <tr onmouseover="this.style.backgroundColor='#3F3F3F';" onmouseout="this.style.backgroundColor='darkgrey';">
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
                <?= $bk->getBookIntro() ?>
            </td>
            <td>
                <?= $bk->getRemark() ?>
            </td>
            <td>
                <a href="pro/delete.php?book_id=<?= $bk->getBookId() ?>">删除</a>
                &nbsp;&nbsp;&nbsp;
                <a href="pro/update.php?book_id=<?= $bk->getBookId() ?>">修改</a>
            </td>

            <?php
            }
            }else{
            ?>
                <td colspan="7" style="font-size: 18px">没有该商品</td>
            <?php
            }
            ?>
        </tr>
    </table>
    <a href="pro/Add.html" ><input type="button" value="添加" style="margin-top: 20px;"></a>
</center>
</body>
</html>


