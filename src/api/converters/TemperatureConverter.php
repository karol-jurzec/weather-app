<?php

class TemperatureConverter {
    public static function FahrenheitToCelsius(float $fahrenheit): float {
        $celsTemp = ($fahrenheit - 32) * 0.5555;
        return $celsTemp;
    }
}
