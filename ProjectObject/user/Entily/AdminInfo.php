<?php
class AdminInfo{
    private $id;
    private $username;
    private $userpwd;
    private $telphone;
    private $date;
    //超级管理员
    private $issuper;
    //状态
    private $userstatus;

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
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getUserpwd()
    {
        return $this->userpwd;
    }

    /**
     * @param mixed $userpwd
     */
    public function setUserpwd($userpwd)
    {
        $this->userpwd = $userpwd;
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
    }

    /**
     * @return mixed
     */
    public function getIssuper()
    {
        return $this->issuper;
    }

    /**
     * @param mixed $issuper
     */
    public function setIssuper($issuper)
    {
        $this->issuper = $issuper;
    }

    /**
     * @return mixed
     */
    public function getUserstatus()
    {
        return $this->userstatus;
    }

    /**
     * @param mixed $userstatus
     */
    public function setUserstatus($userstatus)
    {
        $this->userstatus = $userstatus;
    }

}