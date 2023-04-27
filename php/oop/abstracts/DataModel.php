<?php

require_once("DataModel.php");
//cannot make an instance of this class
abstract class DataModel{

    protected $tableName = "random-table-name";

    public function save(){
        echo "saved to $this->tableName!";
    }
}



?>