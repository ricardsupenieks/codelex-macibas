<?php declare(strict_types=1);

namespace App\Models;

class Location {
    private float $latitude;
    private float $longitude;

    public function __construct($latitude, $longitude){
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

}
