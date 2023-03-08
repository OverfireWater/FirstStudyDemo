<?php
class BookInfo{
    public $Book_id;
    public $Book_name;
    public $Book_Author;
    public $Book_Date;
    public $Book_intro;
    public $remark;
    public $Book_img;
    public function __construct($Book_id,$Book_name,$Book_Author,$Book_Date,$Book_intro,$remark,$Book_img)
    {
        $this->Book_id=$Book_id;
        $this->Book_name=$Book_name;
        $this->Book_Author=$Book_Author;
        $this->Book_Date=$Book_Date;
        $this->Book_intro=$Book_intro;
        $this->remark=$remark;
        $this->Book_img=$Book_img;
    }
}