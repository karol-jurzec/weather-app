<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class WeatherController extends AppController {
    public function check() {
        if($this->isPost()) {

            $city = new City( $_POST['cityName'], $_POST['cityCountry']);

            if(isset($_POST['tomorrow'])) {
                $weather = WeatherApiController::getNextDayWeatherFromLocation($city);
                return $this->render('tomorrow', ['messages' => $this->messages, 'city' => $city, 'weather' => $weather]);
            }
            else if(isset($_POST['details'])) {
                $weather = WeatherApiController::getCurrentWeatherFromLocation($city);
                return $this->render('details', ['messages' => $this->messages, 'city' => $city, 'weather' => $weather]);
            }

            return $this->render('weather', ['messages' => $this->messages, 'city' => $city, 'weather' => $currWeather]);
        }

        $this->render('weather', ['messages' => $this->messages]);
    }
}