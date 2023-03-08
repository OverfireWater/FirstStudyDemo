<?php
include "config.php";
include "Entity/userInfo.php";
$smarty=new Smarty();
$use=new userInfo();
$use->setName('张三');
$use->setSex('男');
$use->setTel('1523456123');
$use1=new userInfo();
$use1->setName('李四');
$use1->setSex('女');
$use1->setTel('152345456');
$arr=[$use,$use1];
$smarty->assign("name","李四");
$smarty->assign("title","Smarty_php");
$smarty->assign('value',$arr);
try {
    $smarty->display("index.tpl");
} catch (SmartyException $e) {
    echo $e;
}
?>
<!--<!DOCTYPE html>-->
<!--<style type="text/css">-->
<!--div{font-size:18px;color:#0000FF;}-->
<!--li{font-size:24px;color:#FF0000;}-->
<!--</style>-->
<!---->
<!--<form action="" method="post">-->
<!--    <table align="center">-->
<!--        <tr><td bgcolor="#CCCCCC"><div>当前最流行的web开发语言：</div></td></tr>-->
<!--        <tr><td><input type="radio" name="vote" value="PHP">PHP</td></tr>-->
<!--        <tr><td><input type="radio" name="vote" value="ASP">ASP</td></tr>-->
<!--        <tr><td><input type="radio" name="vote" value="JSP">JSP</td></tr>-->
<!--        <tr><td><input type="submit" name="sub" value="请投票"></td></tr>-->
<!--    </table>-->
<!--</form>-->
<!---->
<!--//    $votefile="EX5_2vote.txt";-->
<!--//    if(!file_exists($votefile))-->
<!--//    {-->
<!--//        file_put_contents($votefile,"0|0|0");-->
<!--//    }-->
<!--//    if(isset($_POST['sub']))-->
<!--//    {-->
<!--//        if(isset($_POST['vote']))-->
<!--//        {-->
<!--//            $vote=$_POST['vote'];-->
<!--//            $votestr=file_get_contents($votefile,0);-->
<!--//            $votearray=explode("|",$votestr);-->
<!--//            echo "<center><h3>投票完毕！</h3></center>";-->
<!--//            if($vote=='PHP') $votearray[0]++;-->
<!--//            echo "<center>目前PHP的票数为：<li>".$votearray[0]."</li></center><br>";-->
<!--//            if($vote=='ASP') $votearray[1]++;-->
<!--//            echo "<center>目前SAP的票数为：<li>".$votearray[1]."</li></center><br>";-->
<!--//            if($vote=='JSP') $votearray[2]++;-->
<!--//            echo "<center>目前JSP的票数为：<li>".$votearray[2]."</li></center><br>";-->
<!--//-->
<!--//            $sum=$votearray[0]+$votearray[1]+$votearray[2];-->
<!--//            echo "<center>总票数为：<li>".$sum."</li></center><br>";-->
<!--//-->
<!--//            $votestr2=implode("|",$votearray);-->
<!--//            file_put_contents($votefile,$votestr2);-->
<!--//        }-->
<!--//        else-->
<!--//        echo "<script>alert('未选择投票选项！')</script>";-->
<!--//    }-->
