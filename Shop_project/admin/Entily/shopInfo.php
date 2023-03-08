<?php
class shopInfo{
    private $id;
    private $classifyId;
    private $name;
    private $vpi;
    private $recommend;
    private $status;
    private $datetime;
    private $remark;
    private $classifyName;
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
    public function getClassifyId()
    {
        return $this->classifyId;
    }

    /**
     * @param mixed $classifyId
     */
    public function setClassifyId($classifyId)
    {
        $this->classifyId = $classifyId;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getVpi()
    {
        return $this->vpi;
    }

    /**
     * @param mixed $vpi
     */
    public function setVpi($vpi)
    {
        $this->vpi = $vpi;
    }

    /**
     * @return mixed
     */
    public function getRecommend()
    {
        return $this->recommend;
    }

    /**
     * @param mixed $recommend
     */
    public function setRecommend($recommend)
    {
        $this->recommend = $recommend;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * @param mixed $datetime
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;
    }

    /**
     * @return mixed
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * @param mixed $remark
     */
    public function setRemark($remark)
    {
        $this->remark = $remark;
    }

    /**
     * @return mixed
     */
    public function getClassifyName()
    {
        return $this->classifyName;
    }

    /**
     * @param mixed $classifyName
     */
    public function setClassifyName($classifyName)
    {
        $this->classifyName = $classifyName;
    }

}