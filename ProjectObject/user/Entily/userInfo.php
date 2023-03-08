<?php
class userInfo{
    private $id;
    private $username;
    private $userpwd;
    private $nickname;
    private $regtime;
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
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @param mixed $nickname
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }

    /**
     * @return mixed
     */
    public function getRegtime()
    {
        return $this->regtime;
    }

    /**
     * @param mixed $regtime
     */
    public function setRegtime($regtime)
    {
        $this->regtime = $regtime;
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