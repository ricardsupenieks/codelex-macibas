<?php

require_once "app/API.php";
require_once "app/Data.php";

$city = readline("Enter city: ");
$apiKey = "8f89449f29a850cb16318e42cf140139";

$api = new API($apiKey);
$apiInfo = $api->getInfo($city);

$lat = $apiInfo[0]["lat"] ;
$lon = $apiInfo[0]["lon"];


$data = new Data($apiKey);
$result = $data->getData($lat, $lon);


$temperature = $result["main"]["temp"] - 273.15;
$weather = $result ["weather"][0]["main"];


echo "Weather in $city" . PHP_EOL;
echo "Temperature = $temperature degrees Celsius" . PHP_EOL;
echo "Weather = $weather" . PHP_EOL;
