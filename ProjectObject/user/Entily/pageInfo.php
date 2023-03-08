<?php
class pageInfo{
    //页码
    private $pageNum;
    //每页的数据
    private $pageSize;
    //总页码
    private $Count;
    //查询到的总数据
    private $pageData;
    private $pageUsernameDate;

    /**
     * @return mixed
     */
    public function getPageUsernameDate()
    {
        return $this->pageUsernameDate;
    }

    /**
     * @param mixed $pageUsernameDate
     */
    public function setPageUsernameDate($pageUsernameDate)
    {
        $this->pageUsernameDate = $pageUsernameDate;
    }

    /**
     * @return mixed
     */
    public function getPageData()
    {
        return $this->pageData;
    }

    /**
     * @param mixed $pageData
     */
    public function setPageData($pageData)
    {
        $this->pageData = $pageData;
    }

    /**
     * @return mixed
     */
    public function getPageNum()
    {
        return $this->pageNum;
    }

    /**
     * @param mixed $pageNum
     */
    public function setPageNum($pageNum)
    {
        $this->pageNum = $pageNum;
    }

    /**
     * @return mixed
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @param mixed $pageSize
     */
    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->Count;
    }

    /**
     * @param mixed $Count
     */
    public function setCount($Count)
    {
        $this->Count = $Count;
    }
//    获取总页数
    function getDataCount(){
        return ceil($this->Count/$this->pageSize);
    }
    //下一页
    function nextPage(){

        if($this->pageNum < $this->getDataCount()){
            return $this->pageNum+1;
        }
        return $this->pageNum;
    }
    //上一页
    function upPage(){
        if($this->pageNum>1){
            return $this->pageNum-1;
        }
        return $this->pageNum;
    }
}