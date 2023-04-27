<?php

require_once("ThreeDimensionalShape.php");

class Cylinder extends ThreeDimensionalShape{

    /**
     * 
     * Calculate the volume [V = πr2h]
     * 
     * 
     * @return float
     * 
     */
     public function volume(){
        return pi() * pow($this->dimensions['radius'], 2) * $this->dimensions['height'];
     } 
}

?>