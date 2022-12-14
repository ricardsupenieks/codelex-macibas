<?php declare(strict_types=1);

namespace App;

class API {
    protected string $apiKey;

    public function __construct($apiKey){
        $this->apiKey = $apiKey;
    }

    public function getInfo($city){
        $apiURL = "https://api.openweathermap.org/geo/1.0/direct?q=$city&limit=1&appid=$this->apiKey";
        $content = file_get_contents($apiURL);
        return json_decode($content, true);
    }
}
