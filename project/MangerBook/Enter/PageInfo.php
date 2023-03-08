<?php
class PageInfo{
    //页码
    public $pageNum;
    //每页的数据
    public $pageSize;
    //一共多少条数据
    public $count;
    //每一页显示的数据
    public $pageDate;


    //构造函数
    public function __construct($pageNum,$pageSize,$count,$pageDate)
    {
        $this->pageNum=$pageNum;
        $this->pageSize=$pageSize;
        $this->count=$count;
        $this->pageDate=$pageDate;
    }

    //定义一个显示的总页码
    function getPageCount(){

        //如果总数据不能被每页的数据整除
        if($this->count%$this->pageSize!=0){
            //则返回每页数据的页面并上舍入
           return ceil($this->count/$this->pageSize);
        }
        //如果能被整除，则返回整除数据的页码
        else{
            return $this->count/$this->pageSize;
        }
    }

    //下一页
    function nextPage(){
        //引用显示页码的方法
        $pageCount=$this->getPageCount();
        //如果当前页码小于总页码
        if($this->pageNum<$pageCount){
            //则当前页面加一并返回
            return $this->pageNum=$this->pageNum+1;
        }
        //否则返回当前页面
        return $this->pageNum;
    }

    //上一页
    function upPage(){
        //如果上一页的页码小于等于0，则返回当前页码
        if($this->pageNum<=0){
            return $this->pageNum;
        }
        //否则当前页码—1并返回
        return $this->pageNum-1;
    }
}
