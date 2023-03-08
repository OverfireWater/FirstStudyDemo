<?php
class UserInfo{
    private $Uid;
    private $Uname;
    private $Upwd;

    /**
     * @return mixed
     */
    public function getUid()
    {
        return $this->Uid;
    }

    /**
     * @param mixed $Uid
     */
    public function setUid($Uid)
    {
        $this->Uid = $Uid;
    }

    /**
     * @return mixed
     */
    public function getUname()
    {
        return $this->Uname;
    }

    /**
     * @param mixed $Uname
     */
    public function setUname($Uname)
    {
        $this->Uname = $Uname;
    }

    /**
     * @return mixed
     */
    public function getUpwd()
    {
        return $this->Upwd;
    }

    /**
     * @param mixed $Upwd
     */
    public function setUpwd($Upwd)
    {
        $this->Upwd = $Upwd;
    }
}