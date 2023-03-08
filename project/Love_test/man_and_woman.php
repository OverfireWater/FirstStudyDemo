<?php
include "person.php";
//男孩的条件
class man extends person{
    public $car;
    public $house;
    public $money;
    public function __construct($name, $sex, $age, $birth,$car,$house,$money)
    {
        parent::__construct($name, $sex, $age, $birth);
        $this->car=$car;
        $this->house=$house;
        $this->money=$money;
    }
    function much_money(){
        if($this->money>=100000){
            return true;
        }else{
            return false;
        }
    }
}
class woman extends person{
    //静态变量
    public static $count=0;
    public function __construct($name, $sex, $age, $birth)
    {
        parent::__construct($name, $sex, $age, $birth);
    }
    //如果成功了
    function girlfriend(){
        echo "恭喜你们!".$this->success();
        if(self::$count>1){
            echo "恭喜找到绿茶!";
        }
    }
    function lose(){
        echo "失败了，配对失败";
    }
}