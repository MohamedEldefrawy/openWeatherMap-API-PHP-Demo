<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class OpenWeatherGuzzle implements IOpenWeather
{

    function getWeatherOfCity($cityName): array
    {

        $cityName = str_replace(" ", "%20", $cityName);

        $requestUrl = "api.openweathermap.org/data/2.5/weather?q=" . $cityName . ",eg&units=metric&mode=JSON&APPID=" . API_KEY;
        $client = new Client();
        $response = null;

        try {
            $response = $client->get($requestUrl);
        } catch (GuzzleException $e) {
            $response = [
                'status' => 501,
                'message' => "Internal server error"
            ];
        }

        $json_response = json_decode($response->getBody(), true);

        return [
            "description" => $json_response["weather"][0]["description"],
            "temp" => $json_response["main"]["temp"],
            "humidity" => $json_response["main"]["humidity"],
            "wind" => $json_response["wind"]["speed"],
            "icon" => $json_response["weather"][0]["icon"],
            "timezone" => $json_response["timezone"],
            "sunset" => $json_response["sys"]["sunset"],
            "name" => $json_response["name"]
        ];
    }
}