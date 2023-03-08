<?php
class BookInfo{
    public $book_id;
    public $book_name;
    public $book_author;
    public $book_date;
    public $book_intro;
    public $book_img;
    public $remark;
public function __construct($book_id,$book_name,$book_author,$book_intro,$book_date,$book_img,$remark)
{
    $this->book_id=$book_id;
    $this->book_name=$book_name;
    $this->book_author=$book_author;
    $this->book_date=$book_date;
    $this->book_intro=$book_intro;
    $this->book_img=$book_img;
    $this->remark=$remark;

}


}
