<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class WeatherRepository extends Repository {

    public function getWeather(int $id) : ?Weather {
       //TODO
        $stmt = self::getInstance()->connect()->prepare('
            SELECT * FROM public.users where user_id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $weather = $stmt->fetch(PDO::FETCH_ASSOC);

        if($weather === false) {
            return null;
        }

        return new Weather(
            "null",
            $weather['rain'],
            $weather['temperature'],
            $weather['humididty'],
            $weather['wind_speed'],
            "null",
            "null",
            "null",
            $weather['pressure'],
            "null",
            $weather['date']
        );
    }

    public function addWeather(Weather $weather, City $city): void {
        $userId = $_SESSION['user_id'];
        $cityName = $city->getName();
        $country = $city->getCountry();
        $date = date('Y/m/d H:i:s', $weather->getDate());
        $temperature = $weather->getTemperature();
        $windSpeed = $weather->getWindSpeed();
        $pressure = $weather->getPressure();
        $humidity = $weather->getHumidity();
        $rain = !$weather->getRain()? 0 : !$weather->getRain();

        $stmt = self::getInstance()->connect()->prepare('
            SELECT add_weather(:user_id, :city_name, :country, :date, :temperature, :wind_speed, :pressure, :humidity, :rain) 
        ');

        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':city_name', $cityName, PDO::PARAM_STR);
        $stmt->bindParam(':country', $country, PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->bindParam(':temperature', $temperature, PDO::PARAM_STR);
        $stmt->bindParam(':wind_speed', $windSpeed, PDO::PARAM_STR);
        $stmt->bindParam(':pressure', $pressure, PDO::PARAM_STR);
        $stmt->bindParam(':humidity', $humidity, PDO::PARAM_STR);
        $stmt->bindParam(':rain', $rain, PDO::PARAM_STR);

        $stmt->execute();

        $weather = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}