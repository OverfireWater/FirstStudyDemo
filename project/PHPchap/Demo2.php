<?php
//继承
class product{
    public $name;
    public $princ;
    public $weight;
    public $create_date;
    public function __construct($name,$princ,$weight,$create_date)
    {
        $this->name=$name;
        $this->princ=$princ;
        $this->weight=$weight;
        $this->create_date=$create_date;
    }
    function sal(){
        echo "正在出售中:"."名称:".$this->name."价格:".$this->princ."元"."重量:".$this->weight."kg".
            "日期:".$this->create_date."<br/>";
    }
}
class book extends product{
    private $date;

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
        echo $date."本";
    }
    public function __construct($name, $princ, $weight, $create_date)
    {
        parent::__construct($name, $princ, $weight, $create_date);
    }
    function sold(){
        product::sal();
        echo "已出售:";
    }
}
$say=new book("《漂流记》","20","100","1999-10-25");
$say->sold();
?><?php
