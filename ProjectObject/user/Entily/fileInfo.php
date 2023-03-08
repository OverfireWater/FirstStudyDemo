<?php
class fileInfo{
    private $id;
    private $uid;
    private $filename;
    private $truename;
    private $filesize;
    private $filetype;
    private $addtime;
    private $filestatus;
    private $nickname;

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
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param mixed $uid
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
    }

    /**
     * @return mixed
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param mixed $filename
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    /**
     * @return mixed
     */
    public function getTruename()
    {
        return $this->truename;
    }

    /**
     * @param mixed $truename
     */
    public function setTruename($truename)
    {
        $this->truename = $truename;
    }

    /**
     * @return mixed
     */
    public function getFilesize()
    {
        return $this->filesize;
    }

    /**
     * @param mixed $filesize
     */
    public function setFilesize($filesize)
    {
        $this->filesize = $filesize;
    }

    /**
     * @return mixed
     */
    public function getFiletype()
    {
        return $this->filetype;
    }

    /**
     * @param mixed $filetype
     */
    public function setFiletype($filetype)
    {
        $this->filetype = $filetype;
    }

    /**
     * @return mixed
     */
    public function getAddtime()
    {
        return $this->addtime;
    }

    /**
     * @param mixed $addtime
     */
    public function setAddtime($addtime)
    {
        $this->addtime = $addtime;
    }

    /**
     * @return mixed
     */
    public function getFilestatus()
    {
        return $this->filestatus;
    }

    /**
     * @param mixed $filestatus
     */
    public function setFilestatus($filestatus)
    {
        $this->filestatus = $filestatus;
    }

}