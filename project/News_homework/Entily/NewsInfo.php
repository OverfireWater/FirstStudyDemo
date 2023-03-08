<?php
class NewsInfo{
    private $news_id;
    private $news_title;
    private $news_content;
    private $news_date;

    /**
     * @return mixed
     */
    public function getNewsId()
    {
        return $this->news_id;
    }

    /**
     * @param mixed $news_id
     */
    public function setNewsId($news_id)
    {
        $this->news_id = $news_id;
    }

    /**
     * @return mixed
     */
    public function getNewsTitle()
    {
        return $this->news_title;
    }

    /**
     * @param mixed $news_title
     */
    public function setNewsTitle($news_title)
    {
        $this->news_title = $news_title;
    }

    /**
     * @return mixed
     */
    public function getNewsContent()
    {
        return $this->news_content;
    }

    /**
     * @param mixed $news_content
     */
    public function setNewsContent($news_content)
    {
        $this->news_content = $news_content;
    }

    /**
     * @return mixed
     */
    public function getNewsDate()
    {
        return $this->news_date;
    }

    /**
     * @param mixed $news_date
     */
    public function setNewsDate($news_date)
    {
        $this->news_date = $news_date;
    }

    /**
     * @return mixed
     */
    public function getNewsType()
    {
        return $this->news_type;
    }

    /**
     * @param mixed $news_type
     */
    public function setNewsType($news_type)
    {
        $this->news_type = $news_type;
    }
    private $news_type;
}
class news_type{
    //新闻类型表的id
    private $news_type_id;

    /**
     * @return mixed
     */
    public function getNewsTypeId()
    {
        return $this->news_type_id;
    }

    /**
     * @param mixed $news_type_id
     */
    public function setNewsTypeId($news_type_id)
    {
        $this->news_type_id = $news_type_id;
    }

    /**
     * @return mixed
     */
    public function getNewsTypeType()
    {
        return $this->news_type_type;
    }

    /**
     * @param mixed $news_type_type
     */
    public function setNewsTypeType($news_type_type)
    {
        $this->news_type_type = $news_type_type;
    }
    //新闻类型表的类型
    private $news_type_type;
}