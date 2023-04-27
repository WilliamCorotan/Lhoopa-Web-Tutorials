<?php

require("DataModel.php");

class Product extends DataModel{

        private $name;
        private $price;
        private $tableName = "products_table";

        public function getName(){
            return $this->name;
        }

        public function setName($name){
            $this->name = $name;
        }

        public function getPrice(){
            return $this->name;
        }

        public function setPrice($price){
            $this->price = $price;
        }

        public function save(){
            echo "Save data to: " . $this->tableName;
        }
}

?>