<?php

require_once 'AppController.php';
require_once __DIR__.'/../api/WeatherApiController.php';
require_once __DIR__.'/../models/City.php';
require_once __DIR__.'/../models/Weather.php';

class CityController extends AppController {
    private $messages = [];
    public function find() {
        if($this->isPost()) {

            $cityName = $_POST['city'];

            $city = new City($cityName, 'Poland');
            $currWeather = WeatherApiController::getCurrentWeatherFromLocation($city);

            return $this->render('weather', ['messages' => $this->messages, 'city' => $city, 'weather' => $currWeather]);
        }

         $this->render('search', ['messages' => $this->messages]);
    }
}