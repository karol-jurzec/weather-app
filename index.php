<?php

require "Routing.php";

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('index', 'DefaultController');
Routing::get('search', 'DefaultController');
Routing::get('rain', 'DefaultController');
Routing::get('tomorrow', 'DefaultController');
Routing::get('weather', 'DefaultController');
Routing::get('wind', 'DefaultController');

Routing::post('login', 'SecurityController');
Routing::post('find', 'CityController');


Routing::run($path);