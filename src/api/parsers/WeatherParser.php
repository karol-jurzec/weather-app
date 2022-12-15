<?php

class WeatherParser {
    public static function ToWeather($resp) : Weather {
        $main = strtolower($resp['weather'][0]['main']);
        $rain = $resp['rain'];
        $temperature =  (int)$resp['main']['temp'];
        $humidity = $resp['main']['humidity'];

        $windSpeed = $resp['wind']['speed'];
        $windGusts = $resp['wind']['gust'];
        $windDegree = $resp['wind']['deg'];

        $visibility = $resp['visibility'];
        $pressure = $resp['main']['pressure'];
        $clouds = $resp['clouds']['all'];
        $date = $resp['dt'];

        return new Weather(
            $main,
            $rain,
            $temperature,
            $humidity,
            $windSpeed,
            $windGusts,
            $windDegree,
            $visibility,
            $pressure,
            $clouds,
            $date
        );
    }
}
