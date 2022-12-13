<?php

require_once __DIR__ . '/../models/City.php';
require_once __DIR__ . '/../models/Weather.php';
require_once __DIR__ . '/../models/Coordinates.php';
require_once __DIR__ . '/../api/parsers/WeatherParser.php';

//Call 5 day / 3 hour forecast data: /url/: api.openweathermap.org/data/2.5/forecast?lat={lat}&lon={lon}&appid={API key}
//Current weather: /url/: api.openweathermap.org/data/2.5/weather?lat={lat}&lon={lon}&appid={API key}
//Geocoding API: api.openweathermap.org/geo/1.0/direct?q={city name},{state code},{country code}&limit={limit}&appid={API key}

// controller which collects data from weather API using API token
class WeatherApiController {
    const API_TOKEN = '77978dc71db00a782f128ecda6b90f59';

    private static function callRequest(string $url) {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $resp = json_decode(curl_exec($curl), true);
        curl_close($curl);

        return $resp;
    }

    private static function getCityCoordinates(City $city) : Coordinates
    {
        $url = 'api.openweathermap.org/geo/1.0/direct?q=' . $city->getName() . ',' . $city->getCountry() . '&limit=1&appid=' . self::API_TOKEN . "&units=metric";

        $resp = self::callRequest($url);

        $longitude = $resp[0]['lon'];
        $latitude = $resp[0]['lat'];

        return new Coordinates($latitude, $longitude);
    }

    public static function getCurrentWeatherFromLocation(City $city) : Weather
    {
        $coordinates = self::getCityCoordinates($city);
        $url = 'api.openweathermap.org/data/2.5/weather?lat=' . $coordinates->getLatitude() . '&lon=' . $coordinates->getLongitude() . '&appid=' . self::API_TOKEN . '&units=metric';
        $resp = self::callRequest($url);

        $weather = WeatherParser::ToWeather($resp);

        return $weather;
    }

    public static function getNextDayWeatherFromLocation(City $city) : Weather {
        $coordinates = self::getCityCoordinates($city);
        $url = 'api.openweathermap.org/data/2.5/forecast?lat='.$coordinates->getLatitude().'&lon='.$coordinates->getLongitude().'&appid='. self::API_TOKEN . "&units=metric";
        $resp = self::callRequest($url);

        //8 - next day +24h
        $weather = WeatherParser::ToWeather($resp['list'][8]);

        return $weather;
    }
}
