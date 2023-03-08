<?php
class Parent_classify{
    private $id;
    private $Parent_classifyName;
    private $remark;
    private $datetime;

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
    public function getParentClassifyName()
    {
        return $this->Parent_classifyName;
    }

    /**
     * @param mixed $Parent_classifyName
     */
    public function setParentClassifyName($Parent_classifyName)
    {
        $this->Parent_classifyName = $Parent_classifyName;
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

}