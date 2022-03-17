<?php

class CountryReader
{
    private string $country_code;

    public function get_cities(string $countryCode)
    {
        $this->country_code = $countryCode;
        $file = json_decode(file_get_contents('./Static/city.list.json'), true);
        return array_filter($file, function ($city) {
            return $city["country"] === $this->country_code;
        });
    }
}