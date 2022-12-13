<?php

class Coordinates {
    private $latitude;
    private $longitude;

    public function __construct(string $latitude, string $longitude) {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function getLatitude() : string {
        return $this->latitude;
    }

    public function setLatitude( string $latitude ) {
        $this->latitude = $latitude;
    }

    public function getLongitude() : string {
        return $this->longitude;
    }

    public function setLongitude( string $longitude ) {
        $this->longitude = $longitude;
    }

}