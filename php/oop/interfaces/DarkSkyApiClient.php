<?php 

class DarkSkyApiClient implements WeatherApiClientInterface{

    public function getForcast($city)
    {
        return "It is raining in $city";
    }

}

?>