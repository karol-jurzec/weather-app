
<?php
require_once __DIR__.'/../models/City.php';
require_once __DIR__.'/../models/Weather.php';
require_once __DIR__.'/../models/Coordinates.php';

    //Call 5 day / 3 hour forecast data: /url/: api.openweathermap.org/data/2.5/forecast?lat={lat}&lon={lon}&appid={API key}
    //Current weather: /url/:
    //Geocoding API: api.openweathermap.org/geo/1.0/direct?q={city name},{state code},{country code}&limit={limit}&appid={API key}

    // controller which collects data from weather API using API token
    Class WeatherApiController {
        const API_TOKEN = '77978dc71db00a782f128ecda6b90f59';

        private function getCityCoordinates(City $city) : Coordinates {
            $url = 'api.openweathermap.org/geo/1.0/direct?q='.$city->getName().','.$city->getCountry().'&limit=1&appid='.self::API_TOKEN;

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $resp = json_decode(curl_exec($curl), true);

            $longitude = $resp[0]['lon'];
            $latitude = $resp[0]['lat'];

            curl_close($curl);

            return new Coordinates($latitude, $longitude);
        }

        public function getCurrentWeatherFromLocation(City $city) : Weather {
            $coordinates = $this->getCityCoordinates($city);

            $url = 'api.openweathermap.org/data/2.5/weather?lat='.$coordinates->getLatitude().'&lon='.$coordinates->getLongitude().'&appid='.self::API_TOKEN;

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $resp = json_decode(curl_exec($curl), true);



        }
    }