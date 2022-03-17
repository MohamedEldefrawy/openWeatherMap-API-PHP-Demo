<?php
$openWeather = new OpenWeather();
$result = $openWeather->getWeatherOfCity("Alexandria");
var_dump($result["name"]);
//var_dump($result);
?>

<h1>Weather of <?= $result[1] ?></h1>
