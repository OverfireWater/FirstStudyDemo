<?php
include "Anmails.php";
include "Anmail_insetface.php";
class cat extends anmails implements say{
    public function say($voice)
    {
        echo $voice;
    }
    function person_reac()
    {
        echo "这是猫，听见主人的呼唤跑过来";
    }
}
$dog=new cat();
$dog->say("喵喵喵");
echo "</br>";
$dog->person_reac();
echo "</br>";
$dog->suckle();
echo "</br>";
$dog->breath();
echo "</br>";
$dog->work();