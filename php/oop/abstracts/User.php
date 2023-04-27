<?php

require_once("DataModel.php");

class User extends DataModel
{
    protected $tableName = "users";

public function save(){
    print_r("Saving data to table: " . $this->tableName);
}
}
?> 