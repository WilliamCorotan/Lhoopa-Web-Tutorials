<?php

// creating a new object class
class Character {
    private $name;
    private $level;
    public static $dev = 'dev=false';

    // constructor function
    public function __construct($name, $level)
    {
        $this->name = $name;
        $this->level = $level;
    }

    public function __destruct()
    {
        echo "destroyed";
    }

    // setter function for name
    public function setName($name){
        $this->name = $name;
    }
    // getter function for name
    public function getName(){
        return $this->name; 
    }

    // setter function for level
    public function setLevel($level){
        $this->level = $level;
    }
    // getter function for level
    public function getLevel(){
        return $this->level; 
    }
    public static function print($str){
        return ($str);
    }

    public function getDevStatus(){
        return self::$dev;
    }
}

// extending a class to another class
class Warrior extends Character {
    private $blessing = 'Warrior';

    public function __construct($name, $level, $blessing)
    {   
        // binds parent constructor to the child constructor
        parent::__construct($name, $level, $blessing);
        // binds the new property to the class
        $this->blessing = $blessing;
    }
}


$link = new Character('Link', '1', 'Warrior');
 
$a = Character::print('hello');

echo Character::print('str');
echo $link->getDevStatus();
?>