<?php declare(strict_types=1);

namespace App;

class Data extends API {

    public function getData($latitude, $longitude){
        $apiURL = "https://api.openweathermap.org/data/2.5/weather?lat=$latitude&lon=$longitude&appid=$this->apiKey";
        $data = file_get_contents($apiURL);
        return json_decode($data, true);
    }
}
