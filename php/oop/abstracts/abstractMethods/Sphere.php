<?php

require_once('ThreeDimensionalShape.php');

class Sphere extends ThreeDimensionalShape
{

    /**
     * 
     * calculate for the volume [V=4/3(πr^3)]
     * 
     * @return float
     * 
     */
    public function volume()
    {
        return 4 / 3 * (pi()* pow($this->dimensions, 3));
    }

}

?>