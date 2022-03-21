<?php

class OpenWeatherCurl implements IOpenWeather
{

    function getWeatherOfCity($cityName): array
    {
        $curl = curl_init();

        $cityName = str_replace(" ", "%20", $cityName);

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://community-open-weather-map.p.rapidapi.com/weather?q=" . $cityName . "%2Ceg&lang=null&units=metric&mode=JSON", CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => Curl_OPEN_WEATHER_CREDENTIALS,
        ]);

        $response = curl_exec($curl);
        $json_response = json_decode($response, true);
        curl_close($curl);

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