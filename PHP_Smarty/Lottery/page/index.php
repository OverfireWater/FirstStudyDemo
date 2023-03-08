<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>投票系统</title>
    <style>
        .submit{
            border: 0;
            height: 40px;
            width: 80px;
            background-color: aqua;
            border-radius: 10%;
            cursor: pointer;
            margin-top: 50px;
        }
    </style>
    <?php
    session_start();
    include "../DB/DBhelper.php";
    $DB=new DBhelper();
    echo $_SESSION['lot'];
    $ip_agin=$_SERVER["REMOTE_ADDR"];//获取IP并保存到变量IP中
    echo "你的IP是".$ip_agin;
    $arr=$DB->queryDate_ip("select * from ip where ip='".$ip_agin."'");
    if($arr>0){
        echo "<script>alert('投票结束');window.location.href='err.php';</script>";
    }
    ?>
    <script>
        function submit_student(){
            var flag=false;

            var stu=document.getElementsByName('name');
            for (var i=0;i<stu.length;i++){
                if (stu[i].checked){
                    flag=true;
                    break;
                }
            }

                if (flag==true){
                    document.getElementById('form_monitor').submit();

                }else {
                    alert('请选择后进行投票！');
                }

        }
        function submit_study(){
            var flag=false;

            var stu=document.getElementsByName('name');
            for (var i=0;i<stu.length;i++){
                if (stu[i].checked){
                    flag=true;
                    break;
                }
            }

            if (flag==true){
                document.getElementById('form_study').submit();

            }else {
                alert('请选择后进行投票！');
            }

        }
        function submit_leader(){
            var flag=false;

            var stu=document.getElementsByName('name');
            for (var i=0;i<stu.length;i++){
                if (stu[i].checked){
                    flag=true;
                    break;
                }
            }

            if (flag==true){
                document.getElementById('form_leader').submit();

            }else {
                alert('请选择后进行投票！');
            }

        }
        function display_none(){
            var time="<?=$_COOKIE['lot']?>";
            if (time=="1"){
                document.getElementById('form_monitor').style.display="none";
                document.getElementById('form_study').setAttribute("style","");
            }if (time=="2"){
                document.getElementById('form_monitor').style.display="none";
                document.getElementById('form_study').style.display="none";
                document.getElementById('form_leader').setAttribute("style","");
            }if (time=="3"){
                document.getElementById('form_monitor').style.display="none";
                document.getElementById('form_study').style.display="none";
                document.getElementById('form_leader').style.display="none";
            }
        }


    </script>
</head>
<body onload="display_none()">
<center>

<form action="lotteryServices.php" method="post" id="form_monitor">
    <h2><p style="color: red">班长</p>  <p>选举投票</p></h2>
    <table>
        <?php

        $stu=$DB->queryDate_student("select * from student");
        for ($i=0;$i<count($stu);$i++){
            $stu_arr=$stu[$i]['name'];
            $stu_arr_id=$stu[$i]['id'];
        ?>
        <tr>
            <td  style="padding-top: 10px"><input type="radio" name="name" value="<?=$stu_arr_id?>"><span><?=$stu_arr?></span></td>
        </tr>
        <?php
        }
        ?>
        <tr>
            <td ><input type="button" value="提交" class="submit" onclick="submit_student()"></td>
        </tr>
    </table>
</form>
</center>
<center>

    <form action="studyServices.php" method="post" id="form_study" style="display: none">
        <h2><p style="color: red">学习委员</p>  <p>选举投票</p></h2>
        <table>
            <?php
            $stu=$DB->queryDate_student("select * from student");
            for ($i=0;$i<count($stu);$i++){
                $stu_arr=$stu[$i]['name'];
                $stu_arr_id=$stu[$i]['id'];
                ?>
                <tr>
                    <td  style="padding-top: 10px"><input type="radio" name="name" value="<?=$stu_arr_id?>"><span><?=$stu_arr?></span></td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td ><input type="button" value="提交" class="submit" onclick="submit_study()"></td>
            </tr>
        </table>
    </form>
</center>
<center>

    <form action="leader.php" method="post" id="form_leader" style="display: none">
        <h2><p style="color: red">组长</p>  <p>选举投票</p></h2>
        <table>
            <?php
            $stu=$DB->queryDate_student("select * from student");
            for ($i=0;$i<count($stu);$i++){
                $stu_arr=$stu[$i]['name'];
                $stu_arr_id=$stu[$i]['id'];
                ?>
                <tr>
                    <td  style="padding-top: 10px"><input type="radio" name="name" value="<?=$stu_arr_id?>"><span><?=$stu_arr?></span></td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td ><input type="button" value="提交" class="submit" onclick="submit_leader()"></td>
            </tr>
        </table>
    </form>
</center>
</body>
</html>
