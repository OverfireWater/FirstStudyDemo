<?php
class anmails{
    private $anmails;

    /**
     * @return mixed
     */
    public function getAnmails()
    {
        return $this->anmails;
    }

    /**
     * @param mixed $anmails
     */
    public function setAnmails($anmails)
    {
        $this->anmails = $anmails;
    }
    //哺乳动物
    public function suckle(){
        echo "他是哺乳动物";
    }
    //肺呼吸
    public function breath(){
        echo "他是用肺呼吸";
    }
    //走路
    public function work(){
        echo "他是用四条腿走路";
    }
    //主人的呼唤
    public function person_reac(){
        echo "主人的呼唤";
    }
}