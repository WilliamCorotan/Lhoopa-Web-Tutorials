<?php

interface WeatherApiClientInterface
{
    // this is needed to be declared in the classes that implements me
    public function getForcast($city);


}

?>