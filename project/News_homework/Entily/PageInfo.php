<?php
class PageInfo{
    //页码
    public $pageNum;
    //每页的数据
    public $pageSize;
    //总共的数据
    public $pageCount;
    //
    public $pageDate;
    public function __construct($pageNum,$pageSize,$pageCount,$pageDate)
    {
        $this->pageNum=$pageNum;
        $this->pageSize=$pageSize;
        $this->pageCount=$pageCount;
        $this->pageDate=$pageDate;
    }

    function getPageCount(){
        if($this->pageCount%$this->pageSize!=0){
          return  ceil($this->pageCount/$this->pageSize);
        }
        return $this->pageCount/$this->pageSize;
    }
//    上一页
    function upPage(){
        if($this->pageNum<=0){
            return $this->pageNum;
        }
        return $this->pageNum-1;
    }
    function nextPage(){
        //获取总页码，并计算当前页与总页码的差值
        $pageCount=$this->getPageCount();
        if($this->pageNum<$pageCount){
            return $this->pageNum=$this->pageNum+1;
        }
        return $this->pageNum;
    }
}