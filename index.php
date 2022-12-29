<?php

session_start();
require "Routing.php";


$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('register', 'DefaultController');

Routing::post('login', 'SecurityController');
Routing::post('logout', 'SecurityController');
Routing::post('register', 'SecurityController');
Routing::post('weather', 'WeatherController');
Routing::post('search', 'WeatherController');
Routing::post('check', 'WeatherController');

Routing::run($path);