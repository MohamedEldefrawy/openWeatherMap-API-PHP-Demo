<?php
$cityName = "";
if (isset($_POST["getWeather"])) {
    if (isset($_POST["listOfCities"])) {
        $cityName = $_POST["listOfCities"];
    }
}

//$curlOpenWeather = new OpenWeatherCurl();
$guzzlOpenWeather = new OpenWeatherGuzzle();
$result = $guzzlOpenWeather->getWeatherOfCity($cityName);

//$result = $curlOpenWeather->getWeatherOfCity($cityName);

$icon = "https://openweathermap.org/img/w/" . $result["icon"] . ".png";
?>

<h1>Weather of <?= $result["name"] ?></h1>
<div><?= date('m/d/Y H:i:s', $result['sunset']) ?></div>
<div><?= $result['description'] ?></div>

<div>
    <img alt='icon' src="<?= $icon ?>"/>
</div>

<div><?= $result["temp"] ?></div>
<div><strong>Humidity: </strong><?= $result["humidity"] ?></div>
<div><strong>Wind: </strong><?= $result["wind"] ?></div>
