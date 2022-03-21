<?php

interface IOpenWeather
{
    function getWeatherOfCity($cityName): array;
}