<?php

require_once 'AppController.php';
require_once __DIR__ . '/../repository/WeatherRepository.php';
require_once __DIR__ . '/../api/WeatherApiController.php';
require_once __DIR__ . '/../models/City.php';
require_once __DIR__ . '/../models/Weather.php';
require_once __DIR__ . '/../models/User.php';

class AdminController extends AppController {
    private $weatherRepository;
    private $userRepository;

    public function __construct() {
        parent::__construct();
        $this->weatherRepository = new WeatherRepository();
        $this->userRepository = new UserRepository();
    }

    public function admin() {
        $this->render('admin', []);
    }
}
