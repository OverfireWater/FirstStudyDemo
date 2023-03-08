<?php
class departInfo{
    private $departId;
    private $departName;
    private $departMark;

    /**
     * @return mixed
     */
    public function getDepartId()
    {
        return $this->departId;
    }

    /**
     * @param mixed $departId
     */
    public function setDepartId($departId)
    {
        $this->departId = $departId;
    }

    /**
     * @return mixed
     */
    public function getDepartName()
    {
        return $this->departName;
    }

    /**
     * @param mixed $departName
     */
    public function setDepartName($departName)
    {
        $this->departName = $departName;
    }

    /**
     * @return mixed
     */
    public function getDepartMark()
    {
        return $this->departMark;
    }

    /**
     * @param mixed $departMark
     */
    public function setDepartMark($departMark)
    {
        $this->departMark = $departMark;
    }

}