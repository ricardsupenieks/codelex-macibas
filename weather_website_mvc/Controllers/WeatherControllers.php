<?php

namespace App\Controllers;

use App\WeatherClient;

class WeatherController{
    public function index(){
        $apiClient = new WeatherClient("cf535c3983a1e276f1b322a4f6afdd40");

        $weather = $apiClient->getWeather("Riga");

        var_dump($weather);

        require_once "views/city.php";
    }

}
