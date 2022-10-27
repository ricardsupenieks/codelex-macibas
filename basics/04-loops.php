<?php

$numbers = [
    10,
    5,
    7,
    48,
    6,
    18
];

foreach ($numbers as $number) {
    echo $number;
    echo PHP_EOL;
}

for ($i = 0; $i < count($numbers); $i++) {
    echo $numbers[$i];
    echo PHP_EOL;
}

for ($x = 1; $x <= 10; $x++) { // $x = 1, while($x <= 10), echo $x
    echo "codelex";
    echo PHP_EOL;
}

foreach ($numbers as $number) {
    if ($number % 3 === 0) {
        echo $number;
        echo PHP_EOL;
    }
}

class Person {
    public $name;
    public $surname;
    public $age;
    public $birthday;

    public function __toString() { //parveido objektu par string
        return "{$this->name} {$this->surname}, {$this->age}, born: {$this->birthday} ";
    }
}

$person1 = new Person();
$person1->name = "Hen";
$person1->surname = "Nessy";
$person1->age = 257;
$person1->birthday = 1765;


$person2 = new Person();
$person2->name = "Stolich";
$person2->surname = "Naya";
$person2->age = 121;
$person2->birthday = 1901;

$people = [
    "Henny" => $person1,
    "Stolis" => $person2
];

foreach ($people as $nickname => $information) {
    echo $information . PHP_EOL;
}