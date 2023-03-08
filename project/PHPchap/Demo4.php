<?php
//接口
interface USB{
    function CD();
    function jiekou();
}
class car{
    function car_carmer(){
        echo "这是触点";
    }

}
class camer extends car implements USB {
    function CD(){
        echo "这是cd，";
    }
    function jiekou(){
        echo "这是接口，";
    }
}
$ca=new camer();
$ca->CD();
$ca->jiekou();
$ca->car_carmer();;