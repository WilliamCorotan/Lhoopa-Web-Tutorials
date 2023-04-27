<?php

class Connection{

    private static $count = 0;

    /**
    *
    * @var string ConnectionId
    * 
    */
    private $connectionId = "123";
    private $conferenceId = "234";


    public function __construct(){
        self::$count++;
        
    }
    public function __destruct(){
        self::$count--;
        
    }
    public function getCount(){
        return self::$count;
    }

    public function setConnectionId($ipAddress){

        if(filter_var($ipAddress, FILTER_VALIDATE_IP)){
            $this->connectionId = "$ipAddress" . '_' . self::$count;
            return;
        }

        die("Not a valid IP Address");
    }

    // magic method for making getter function for individual properties
    public function __get($name)
    {
        return$this->$name;
    }

    public function __toString()
    {
        return "Conference ID: {$this->conferenceId}";
    }
}

?>