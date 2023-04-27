<?php

abstract class ThreeDimensionalShape
{
    protected $dimensions;
    public function __construct($dimensions)
    {
        $this->dimensions = $dimensions;
    }

    abstract public function volume();

}

?>