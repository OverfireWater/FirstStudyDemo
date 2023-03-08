<?php
include "Anmails.php";
include "Anmail_insetface.php";
class pig extends anmails implements say{
public function say($voice)
{
echo $voice;
}
function person_reac()
{
echo "这是猪，听见主人的呼唤他不过来";
}
}
$dog=new pig();
$dog->say("叩叩叩");
echo "</br>";
$dog->person_reac();
echo "</br>";
$dog->suckle();
echo "</br>";
$dog->breath();
echo "</br>";
$dog->work();
