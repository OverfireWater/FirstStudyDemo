<?php
class BookInfo{
    private $Book_id;
    private $Book_name;
    private $Book_Author;
    private $Book_Date;
    private $Book_intro;
    private $remark;
    private $Book_img;

    /**
     * @return mixed
     */
    public function getBookImg()
    {
        return $this->Book_img;
    }

    /**
     * @param mixed $Book_img
     */
    public function setBookImg($Book_img)
    {
        $this->Book_img = $Book_img;
    }

    /**
     * @return mixed
     */
    public function getBookId()
    {
        return $this->Book_id;
    }

    /**
     * @param mixed $Book_id
     */
    public function setBookId($Book_id)
    {
        $this->Book_id = $Book_id;
    }

    /**
     * @return mixed
     */
    public function getBookName()
    {
        return $this->Book_name;
    }

    /**
     * @param mixed $Book_name
     */
    public function setBookName($Book_name)
    {
        $this->Book_name = $Book_name;
    }

    /**
     * @return mixed
     */
    public function getBookAuthor()
    {
        return $this->Book_Author;
    }

    /**
     * @param mixed $Book_Author
     */
    public function setBookAuthor($Book_Author)
    {
        $this->Book_Author = $Book_Author;
    }

    /**
     * @return mixed
     */
    public function getBookDate()
    {
        return $this->Book_Date;
    }

    /**
     * @param mixed $Book_Date
     */
    public function setBookDate($Book_Date)
    {
        $this->Book_Date = $Book_Date;
    }

    /**
     * @return mixed
     */
    public function getBookIntro()
    {
        return $this->Book_intro;
    }

    /**
     * @param mixed $Book_intro
     */
    public function setBookIntro($Book_intro)
    {
        $this->Book_intro = $Book_intro;
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
}