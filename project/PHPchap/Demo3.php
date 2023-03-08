<?php
//静态变量
class product{
    public static $age1=10;
    private $age=10;

    /**
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge($age)
    {
        $this->age = $age;

    }
    static function say(){
        self::$age1+=10;

    }
    function says($age){
        echo $age.",,,,";
    }
}
$ccc=new product();
$ccc->says(5);
product::$age1=12;
echo product::$age1."<br/>";
product::say();
echo product::$age1."<br/>";
product::say();
echo product::$age1."<br/>";
product::say();
echo product::$age1."<br/>";