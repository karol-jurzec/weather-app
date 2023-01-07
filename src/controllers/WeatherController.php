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

            $city = $_POST['city'];
            $userId = $_SESSION['user_id'];

            //TODO get country name
            $city = new City($city, '');
            $today= WeatherApiController::getCurrentWeatherFromLocation($city);
            $tomorrow= WeatherApiController::getNextDayWeatherFromLocation($city);
            $weathers = $this->weatherRepository->getWeathers($userId);
            $this->weatherRepository->addWeather($today, $city);

            return $this->render('weather', ['messages' => $this->messages, 'city' => $city,
                'weather' => $today, 'weathers' => $weathers, 'tomorrow' => $tomorrow]);
        }

        $this->render('search', ['messages' => $this->messages]);
    }

}