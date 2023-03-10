<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改书籍</title>
    <style type="text/css">
        /* Basic Grey */
        .basic-grey {
            margin-left: auto;
            margin-right: auto;
            max-width: 500px;
            background: #F7F7F7;
            padding: 25px 15px 25px 10px;
            font: 12px Georgia, "Times New Roman", Times, serif;
            color: #888;
            text-shadow: 1px 1px 1px #FFF;
            border: 1px solid #E4E4E4;
        }

        .basic-grey h1 {
            font-size: 25px;
            padding: 0px 0px 10px 40px;
            display: block;
            border-bottom: 1px solid #E4E4E4;
            margin: -10px -15px 30px -10px;
            color: #888;
        }

        .basic-grey h1 > span {
            display: block;
            font-size: 11px;
        }

        .basic-grey label {
            display: block;
            margin: 0px;
        }

        .basic-grey label > span {
            float: left;
            width: 20%;
            text-align: right;
            padding-right: 10px;
            margin-top: 10px;
            color: #888;
        }

        .basic-grey input[type="text"], .basic-grey input[type="email"], .basic-grey textarea, .basic-grey select {
            border: 1px solid #DADADA;
            color: #888;
            height: 30px;
            margin-bottom: 16px;
            margin-right: 6px;
            margin-top: 2px;
            outline: 0 none;
            padding: 3px 3px 3px 5px;
            width: 70%;
            font-size: 12px;
            line-height: 15px;
            box-shadow: inset 0px 1px 4px #ECECEC;
            -moz-box-shadow: inset 0px 1px 4px #ECECEC;
            -webkit-box-shadow: inset 0px 1px 4px #ECECEC;
        }

        .basic-grey textarea {
            padding: 5px 3px 3px 5px;
        }

        .basic-grey select {

            /*         background: #FFF url('down-arrow.png') no-repeat right;*/
            /*         background: #FFF url('down-arrow.png') no-repeat right);*/
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            text-indent: 0.01px;
            text-overflow: '';
            width: 70%;
            height: 35px;
            line-height: 25px;

        }

        .basic-grey textarea {
            height: 100px;
        }

        .basic-grey .button {
            background: #E27575;
            border: none;
            padding: 10px 25px 10px 25px;
            color: #FFF;
            box-shadow: 1px 1px 5px #B6B6B6;
            border-radius: 3px;
            text-shadow: 1px 1px 1px #9E3F3F;
            cursor: pointer;
        }

        .basic-grey .button:hover {
            background: #CF7A7A
        }
    </style>
</head>
<body>
<?php
include "../DB/DBhelper.php";
if ($_GET) {
    $news_id = $_GET['news_id'];
}
$db = new DBhelper();
$sql = "select * from newstype where news_id= " . $news_id;
$arr_obj = $db->news_type_obj($sql);
$obj = $arr_obj[0];

?>
<form action="../News_Type_Services/News_Type_update.php" method="post">
    <div class="basic-grey">
        <div class="basic-grey">
            <h1>修改新闻类型
            </h1>
            <label>
                <span>新闻编号 :</span>
                <input id="port" type="text" name="news_type_id" readonly="readonly" value="<?=$news_id?>"/>
            </label>
            <label>
                <span>新闻类型 :</span>
                <input id="port" type="text" name="news_type_type"  value="<?=$obj->getNewsTypeType()?>"/>
            </label>

            <label>
        <label>
            <span>&nbsp;</span>
            <input type="submit" class="button" value="修改"/>
        </label>
    </div>
</form>
<script>
    function changeStyle() {
        var template = document.getElementById("template");
        var index = template.selectedIndex;
        var templatevalue = template.options[index].value;
        var templatecss = document.getElementById("templatecss");
        templatecss.setAttribute("href", "css/" + templatevalue + ".css");
        document.getElementsByTagName("form")[0].setAttribute("class", templatevalue);
    }
</script>
</body>