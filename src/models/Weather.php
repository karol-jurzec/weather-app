
<?php

class Weather {
    private $city;
    private $date;
    private $value;
    private $scale;
    private $rain;
    private $wind;

    public function __construct(string $value, string $scale, string $rain, string $wind) {
        $this->value = $value;
        $this->scale = $scale;
        $this->rain =  $rain;
        $this->wind = $wind;
    }

    public function getValue() : string {
        return $this->value;
    }

    public  function setValue( string $value ) {
        $this->value = $value;
    }

    public function  getScale() : string {
        return $this->scale;
    }

    public function setScale(string $scale) {
        $this->scale= $scale;
    }
}