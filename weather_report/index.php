<?php declare(strict_types=1);

require_once "vendor/autoload.php";

use App\API;
use App\Data;

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

echo "Weather in: $city" . PHP_EOL;
echo "Temperature = $temperature degrees Celsius | Weather = $weather";
