<?php
    class product{
        private $name;
        private $princ;
        private $lenth;
        private $type;
        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         */
        public function setName($name)
        {
            $this->name = $name;
        }

        /**
         * @return mixed
         */
        public function getPrinc()
        {
            return $this->princ;
        }

        /**
         * @param mixed $princ
         */
        public function setPrinc($princ)
        {
            $this->princ = $princ;
        }

        /**
         * @return mixed
         */
        public function getLenth()
        {
            return $this->lenth;
        }

        /**
         * @param mixed $lenth
         */
        public function setLenth($lenth)
        {
            $this->lenth = $lenth;
        }

        /**
         * @return mixed
         */
        public function getType()
        {
            return $this->type;
        }

        /**
         * @param mixed $type
         */
        public function setType($type)
        {
            $this->type = $type;
        }

        public function __construct($name1,$princ1,$lenth1,$type1)
        {
            $this->name=$name1;
            $this->princ=$princ1;
            $this->lenth=$lenth1;
            $this->type=$type1;
        }

        function say(){
            echo "商品名称".$this->name."  "."商品价格".$this->princ."  "."商品数量".$this->lenth."  "."商品类型".$this->type;
        }
    }
    $acho=new product("苹果","￥5/kg","20","水果");
    $acho->say();
?>