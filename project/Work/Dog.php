<?php
include "Anmails.php";
include "Anmail_insetface.php";
class dog extends anmails implements say{
    public function say($voice)
    {
        echo $voice;
    }
    function person_reac()
    {
        echo "这是狗，听见主人的呼唤跑过来";
    }
}
$dog=new dog();
$dog->say("汪汪汪");
echo "</br>";
$dog->person_reac();
echo "</br>";
$dog->suckle();
echo "</br>";
$dog->breath();
echo "</br>";
$dog->work();