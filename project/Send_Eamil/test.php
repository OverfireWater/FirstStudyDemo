<?php
require_once ("phpmailer/class.phpmailer.php");
require_once ("phpmailer/class.smtp.php");
$i=1;
while ($i<5){
    $mail=new PHPMailer();
//$mail->SMTPDebug=1;
    $mail->isSMTP();
    $mail->SMTPAuth=true;
//连接qq邮箱的地址
    $mail->Host='smtp.qq.com';
//使用ssl加密
    $mail->SMTPSecure='ssl';
    $mail->Port=465;
    $mail->CharSet='UTF-8';
    $mail->FromName='over';
    $mail->Username='2632686733@qq.com';
    $mail->Password='vjnvbpezhrpdebad';
    $mail->From='2632686733@qq.com';
    $mail->isHTML(true);
    $mail->addAddress('1405019450@qq.com');
    $mail->Subject='your father';
    $mail->Body='<h1>call</h1>';
    $status=$mail->send();
    var_dump($status);
    if (!$status){
        echo $mail->ErrorInfo;
    }
    $i++;
}

