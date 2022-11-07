<?php

// EXERCISE 1



echo "########## EXERCISE 1 #################"; echo PHP_EOL; echo PHP_EOL;


class Product {
    public $price;
    public $amount;
    public $name;

    public function __construct(string $name, float $price, int $amount) {
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;
    }

    public function printProduct() {
        echo '"' . $this->name . '", ' . $this->price . "EUR, " . $this->amount . " units" . PHP_EOL;
    }

    public function priceChange($newPrice) {
        $this->price = $newPrice;
    }

    public function quantityChange($newQuantity) {
        $this->amount = $newQuantity;
    }

}

$mouse = new Product("Logitech mouse", 70, 14);
$phone = new Product("iPhone 5s", 999.99, 3);
$epson = new Product("Epson EB-U05", 440.46, 1);

$mouse->priceChange(2);
$phone->quantityChange(0);

$mouse->printProduct();
$phone->printProduct();
$epson->printProduct();



// EXERCISE 2



echo "########## EXERCISE 2 #################"; echo PHP_EOL; echo PHP_EOL;


class Point {
    public int $x;
    public int $y;

    public function __construct(int $x, int $y) {
        $this->x = $x;
        $this->y = $y;
    }

    public function swapPoints($point1, $point2) {
        (int) $point1x = $point1->x;
        (int) $point1y = $point1->y;
        (int) $point2x = $point2->x;
        (int) $point2y = $point2->y;

        $point1->x = $point2x;
        $point1->y = $point2y;

        $point2->x = $point1x;
        $point2->y = $point1y;
    }
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);

$p1->swapPoints($p1,$p2);
echo "(" . $p1->x . ", " . $p1->y . ")";
echo PHP_EOL;
echo "(" . $p2->x . ", " . $p2->y . ")";



// EXERCISE 3



echo "########## EXERCISE 3 #################"; echo PHP_EOL; echo PHP_EOL;


class FuelGauge {
    public int $fuel;

    public function __construct(int $fuel) {
        $this->fuel = $fuel;
    }

    public function reportFuel(){
        echo $this->fuel . PHP_EOL;
    }

    public function refill() {
        if($this->fuel < 70) {
            $this->fuel++;
        } else {
            echo "Fuel tank is full" . PHP_EOL;
        }
        return $this->fuel;
    }

    public function burn(){
        if($this->fuel > 0) {
            $this->fuel--;
        } else {
            echo "Fuel tank is empty" . PHP_EOL;
        }
        return $this->fuel;
    }
}

$honda = new FuelGauge(67);
$honda->refill();
$honda->refill();
$honda->refill();


class Odometer {
    public $mileage;

    public function __constructor($mileage) {
        $this->mileage = $mileage;
    }

    public function reportMileage() {
        echo $this->mileage;
    }

    public function increase():int {
        $this->mileage++;
        if ($this->mileage = 1000000) {
            $this->mileage = 0;
        }
        return $this->mileage;
    }

    public function fuelEconomy(){

    }
}