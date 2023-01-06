<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/WeatherRepository.php';
require_once __DIR__.'/../api/WeatherApiController.php';
require_once __DIR__.'/../models/City.php';
require_once __DIR__.'/../models/Weather.php';
require_once __DIR__.'/../models/User.php';


class WeatherController extends AppController {
    private $message = [];
    private $weatherRepository;

    public function __construct() {
        parent::__construct();
        $this->weatherRepository = new WeatherRepository();
    }

    public function weather() {
        $userId = $_SESSION['user_id'];
        $weathers = $this->weatherRepository->getWeathers($userId);
        $this->render('search', ['weathers' => $weathers]);
    }

    public function search() {
        if($this->isPost()) {
            $cityName = $_POST['city'];
            $userId = $_SESSION['user_id'];

            //TODO get country name
            $city = new City($cityName, 'Poland');
            $currWeather = WeatherApiController::getCurrentWeatherFromLocation($city);
            $this->weatherRepository->addWeather($currWeather, $city);
            $weathers = $this->weatherRepository->getWeathers($userId);

            return $this->render('weather', ['messages' => $this->messages, 'city' => $city, 'weather' => $currWeather, 'weathers' => $weathers]);
        }

        $this->render('search', ['messages' => $this->messages]);
    }

    public function check() {
        if($this->isPost()) {
            $userId = $_SESSION['user_id'];

            $city = new City( $_POST['cityName'], $_POST['cityCountry']);
            $weather = WeatherApiController::getCurrentWeatherFromLocation($city);
            $weathers = $this->weatherRepository->getWeathers($userId);

            if(isset($_POST['tomorrow'])) {
                $weather = WeatherApiController::getNextDayWeatherFromLocation($city);
                return $this->render('tomorrow', ['messages' => $this->messages, 'city' => $city, 'weather' => $weather, 'weathers' => $weathers]);
            }
            else if(isset($_POST['details'])) {
                return $this->render('details', ['messages' => $this->messages, 'city' => $city, 'weather' => $weather, 'weathers' => $weathers]);
            }

            return $this->render('weather', ['messages' => $this->messages, 'city' => $city, 'weather' => $weather]);
        }

        $this->render('weather', ['messages' => $this->messages]);
    }
}