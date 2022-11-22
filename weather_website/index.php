<?php declare(strict_types=1);

require_once "vendor/autoload.php";

use App\API;
use App\Data;
use Carbon\Carbon;

if($_GET["city"] === null) {
    $city = "RIGA";
} else {
    $city = strtoupper($_GET["city"]);
}

$apiKey = "8f89449f29a850cb16318e42cf140139";

$api = new API($apiKey);
$apiInfo = $api->getInfo($city);

$lat = $apiInfo[0]["lat"];
$lon = $apiInfo[0]["lon"];


$data = new Data($apiKey);
$result = $data->getData($lat, $lon);

$temperature = number_format($result["main"]["temp"] - 273.15, 2);
$weather = $result ["weather"][0]["main"];

$time = Carbon::now();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Weather</title>
    <style>

        body{
            text-align: center;
            background-color: lightskyblue;
            background-repeat: no-repeat;
            background-position: center;
        }
        h1 {
            padding-top: 100px;
            font-family: "Arial", monospace;
            color: white;
            -webkit-text-stroke: .5px black;
        }

        h2 {
            padding-top: 23px;
            font-size: xx-large;
            font-family: "Arial", monospace;
            color: white;
            -webkit-text-stroke: .5px black;
        }

        a {
            font-family: "Arial", monospace;
        }

        p {
            font-family: "Arial", monospace;
            font-size: xx-large;
            color: white;
            -webkit-text-stroke: .5px black;


        }

        #search{
            width: 600px;
            height: 30px;
        }
    </style>
</head>
<body>
    <h1>WEATHER SEARCH</h1>
    <a href="/?city=Riga">Riga</a> | <a href="/?city=Tallinn">Tallinn</a> | <a href="/?city=Vilnius">Vilnius</a> <br> <br>

    <form method="get">
        <input type="search" id="search" name="city" placeholder="Search for a city"/>

    </form>

    <h2><?php echo "WEATHER IN $city" ?></h2>

    <p><b>
    <?php
    if(array_key_exists('city', $_GET)) {
        button1();
    } else {
        echo "It is $temperature °C and the weather forecast is: $weather";
    }
    function button1() {
        global $temperature, $weather;

        echo "It is $temperature °C and the weather forecast is: $weather";
    }
    ?></b></p><br>

</body>
</html>
