<?php declare(strict_types=1);

namespace App;

use App\Models\Location;
use App\Models\Weather;

class WeatherClient
{
    protected string $apiKey;
    private const API_URL = "https://api.openweathermap.org/";

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getWeather(string $city): Weather
    {
        $location = $this->getLocation($city);
        $apiURL = self::API_URL . "data/2.5/Weather?lat={$location->getLatitude()}&lon={$location->getLongitude()}&appid=$this->apiKey";
        $data = file_get_contents($apiURL);
        $apiInfo = json_decode($data, true);

        $temperature = (float) number_format($apiInfo["main"]["temp"] - 273.15, 2);
        $weather = $apiInfo["Weather"][0]["main"];

        return new Weather($city, $temperature, $weather);
    }

    private function getLocation(string $location): Location
    {
        $apiURL = self::API_URL . "geo/1.0/direct?q=$location&limit=1&appid=$this->apiKey";
        $content = file_get_contents($apiURL);
        $apiInfo = json_decode($content, true);


        $latitude = (float) $apiInfo[0]["lat"] ?? 0;
        $longitude = (float) $apiInfo[0]["lon"] ?? 0;

        return new Location($latitude, $longitude);
    }

}