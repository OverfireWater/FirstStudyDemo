<?php
class empInfo{
    private $employeeId;
    private $name;
    private $age;
    private $sex;
    private $departId;
    private $telphone;
    private $address;
    private $xueli;
    private $mark;
    private $departName;
    private $empImg;

    /**
     * @return mixed
     */
    public function getEmpImg()
    {
        return $this->empImg;
    }

    /**
     * @param mixed $empImg
     */
    public function setEmpImg($empImg)
    {
        $this->empImg = $empImg;
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
    public function getEmployeeId()
    {
        return $this->employeeId;
    }

    /**
     * @param mixed $employeeId
     */
    public function setEmployeeId($employeeId)
    {
        $this->employeeId = $employeeId;
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
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param mixed $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

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
    public function getTelphone()
    {
        return $this->telphone;
    }

    /**
     * @param mixed $telphone
     */
    public function setTelphone($telphone)
    {
        $this->telphone = $telphone;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getXueli()
    {
        return $this->xueli;
    }

    /**
     * @param mixed $xueli
     */
    public function setXueli($xueli)
    {
        $this->xueli = $xueli;
    }

    /**
     * @return mixed
     */
    public function getMark()
    {
        return $this->mark;
    }

    /**
     * @param mixed $mark
     */
    public function setMark($mark)
    {
        $this->mark = $mark;
    }

}