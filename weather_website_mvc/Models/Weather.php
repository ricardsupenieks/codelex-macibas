<?php declare(strict_types=1);

namespace App\Models;

class Weather {
    private float $temperature;
    private string $location;
    private string $weather;

    public function __construct(string $location, float $temperature, string $weather)
    {
        $this->location = $location;
        $this->temperature = $temperature;
        $this->weather = $weather;
    }


    public function getTemperature(): float
    {
        return $this->temperature;
    }

    public function getLocation(): string
    {
        return $this->location;
    }


    public function getWeather(): string
    {
        return $this->weather;
    }

}