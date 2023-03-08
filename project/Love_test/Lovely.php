<?php
include "man_and_woman.php";
class Love_test{
    public $man;
    public $woman;
    public function __construct($man,$woman)
    {
        $this->man=$man;
        $this->woman=$woman;
    }
    //判断是否满足要求
    function test(){
        if($this->man->sex==$this->woman->sex){
            echo "同性不能谈恋爱";
            return;
        }
        if($this->man->car){
            if($this->man->house){
                if($this->man->much_money()){
                    echo $this->man->name."<br>";
                    echo $this->man->sex."<br>";
                    echo $this->man->age."<br>";
                    echo $this->man->birth."<br>";
                    echo "<br>"."<br>"."<br>";
                    echo $this->woman->name."<br>";
                    echo $this->woman->sex."<br>";
                    echo $this->woman->age."<br>";
                    echo $this->woman->birth."<br>";
                    echo "<br>"."<br>"."<br>";
                    echo $this->woman->girlfriend();
                    woman::$count=woman::$count+1;
                   }
                  else{
                    echo $this->woman->lose(),"<br>";
                    echo $this->man->name."存款不够10万,"."<br>".$this->woman->name."看不起你";
                }
            }else{
                echo $this->woman->lose(),"<br>";
                echo $this->man->name."没有房子"."<br>".$this->woman->name."看不起你";
            }
        }else{
            echo $this->woman->lose(),"<br>";
            echo $this->man->name."没有车"."<br>".$this->woman->name."看不起你";
        }
    }
}