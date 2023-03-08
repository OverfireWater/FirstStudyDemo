<?php
class person{
    public $name;
    public $sex;
    public $age;
    public $birth;
    //定义构造函数
    public function __construct($name,$sex,$age,$birth)
    {
        $this->name=$name;
        $this->sex=$sex;
        $this->age=$age;
        $this->birth=$birth;
    }
    //成功了
    function success(){
        echo "你们成功谈恋爱了"."<br>";
    }
}