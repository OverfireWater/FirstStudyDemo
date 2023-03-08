<?php
class topic{
    private $id;
    private $topic;
    private $ans1;
    private $ans2;
    private $ans3;
    private $ans4;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * @param mixed $topic
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;
    }

    /**
     * @return mixed
     */
    public function getAns1()
    {
        return $this->ans1;
    }

    /**
     * @param mixed $ans1
     */
    public function setAns1($ans1)
    {
        $this->ans1 = $ans1;
    }

    /**
     * @return mixed
     */
    public function getAns2()
    {
        return $this->ans2;
    }

    /**
     * @param mixed $ans2
     */
    public function setAns2($ans2)
    {
        $this->ans2 = $ans2;
    }

    /**
     * @return mixed
     */
    public function getAns3()
    {
        return $this->ans3;
    }

    /**
     * @param mixed $ans3
     */
    public function setAns3($ans3)
    {
        $this->ans3 = $ans3;
    }

    /**
     * @return mixed
     */
    public function getAns4()
    {
        return $this->ans4;
    }

    /**
     * @param mixed $ans4
     */
    public function setAns4($ans4)
    {
        $this->ans4 = $ans4;
    }

}