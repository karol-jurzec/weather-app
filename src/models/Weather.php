<?php
class Weather {
    private $main; //rain, wind etc.
    private $rain;
    private $temperature;
    private $humidity;
    private $windSpeed;
    private $windGusts;
    private $windDegree;
    private $visibility;
    private $pressure;
    private $clouds;
    private $date;
    private $icon;
    private $id;

    public function __construct( $main, $rain, $temperature, $humidity, $windSpeed, $windGusts, $windDegree, $visibility, $pressure, $clouds, $date, $id = null) {
        $this->main = $main;
        $this->rain = $rain;
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->windSpeed = $windSpeed;
        $this->windGusts = $windGusts;
        $this->windDegree = $windDegree;
        $this->visibility = $visibility;
        $this->pressure = $pressure;
        $this->clouds = $clouds;
        $this->date = $date;
        $this->id = $id;
    }

    public function getIcon() {
        return $this->icon;
    }

    public function setIcon($icon) {
        $this->icon = $icon;
    }

    public function getMain() {
        return $this->main;
    }

    public function setMain($main) {
        $this->main = $main;
    }

    public function getRain() {
        return $this->rain;
    }

    public function setRain($rain) {
        $this->rain = $rain;
    }

    public function getTemperature() {
        return $this->temperature;
    }

    public function setTemperature($temperature) {
        $this->temperature = $temperature;
    }

    public function getHumidity() {
        return $this->humidity;
    }

    public function setHumidity($humidity) {
        $this->humidity = $humidity;
    }

    public function getWindSpeed() {
        return $this->windSpeed;
    }

    public function setWindSpeed($windSpeed) {
        $this->windSpeed = $windSpeed;
    }

    public function getWindGusts() {
        return $this->windGusts;
    }

    public function setWindGusts($windGusts) {
        $this->windGusts = $windGusts;
    }

    public function getWindDegree() {
        return $this->windDegree;
    }

    public function setWindDegree($windDegree) {
        $this->windDegree = $windDegree;
    }

    public function getVisibility() {
        return $this->visibility;
    }

    public function setVisibility($visibility) {
        $this->visibility = $visibility;
    }

    public function getPressure() {
        return $this->pressure;
    }

    public function setPressure($pressure) {
        $this->pressure = $pressure;
    }

    public function getClouds() {
        return $this->clouds;
    }

    public function setClouds($clouds) {
        $this->clouds = $clouds;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function getId(): int {
        return $this->id;
    }
}