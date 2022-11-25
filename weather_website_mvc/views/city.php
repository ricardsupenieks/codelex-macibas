<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Weather</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1 id="main_header">WEATHER SEARCH</h1>
<a id="links" href="/?city=Riga">Riga</a> | <a href="/?city=Tallinn">Tallinn</a> | <a href="/?city=Vilnius">Vilnius</a> <br> <br>

<form method="get">
    <input type="search" id="search_bar" name="city" placeholder="Search for a city" required/>

</form>

<h2 id="city_header"> WEATHER IN <?= $weather->getLocation() ?>:</h2>

<p id="weather"><b>
        It is <?= $weather->getTemperature() ?> °C and the weather forecast is: <?= $weather->getWeather() ?>

</body>
</html>
