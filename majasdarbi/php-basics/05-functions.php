<?php
function codelexAdder($string) {
    echo $string . " " . "codelex";
}

codelexAdder("hello"); echo PHP_EOL;




function multiply($numOne, $numTwo) {
    if (!is_int($numOne) | !is_int($numTwo)) {
        echo "only integer numbers allowed";
    } else {
        echo $numOne * $numTwo;
    }
}

multiply(5,5); echo PHP_EOL;




$person = new stdClass();
$person->name = "Volks";
$person->surname = "Wagen";
$person->age = 85;

function checkAge($person) {
    if ($person->age >= 18) {
        echo "person has reached age of 18";
    } else {
        echo "person has not reached age of 18";
    }
}

checkAge($person); echo PHP_EOL;




class Person {
    public $name;
    public $surname;
    public $age;
}

$persons = [
    [
        $person = new Person(),
        $person->name = "Black",
        $person->surname = "Berry",
        $person->age = 23
    ],
    [
        $person = new Person(),
        $person->name = "Kodak",
        $person->surname = "Black",
        $person->age = 25
    ]
];

function checkIfUnderage($persons){
    for ($i = 0; $i < count($persons); $i++) {
        $age = $persons[$i][3];
        if ($age < 18 ) {
            echo 'person is underage'; echo PHP_EOL;
        } else {
            echo 'person is not underage'; echo PHP_EOL;
        }
    }
}

checkIfUnderage($persons);



$fruitsWeight = [
    [
        "apples" => 2,
        "oranges" => 4,
        "mangoes" => 10,
        "bananas" => 291
    ]
];

$shippingCost = [
    ">10" => 2,
    "<11" => 1
];

foreach ($fruitsWeight[0] as $fruit => $fruitWeight) {
    if ($fruitWeight > 10) {
        echo "{$fruit}, {$fruitWeight}kg, shipping cost: {$shippingCost[">10"]}euro" . PHP_EOL;
    } else {
        echo "{$fruit}, {$fruitWeight}kg, shipping cost: {$shippingCost["<11"]}euro" . PHP_EOL;
    }
}





$customer = new stdClass();
$customer->name = "Ivars";
$customer->licenses = ['A', 'B', 'C'];
$customer->money = 200;

function createWeapon(string $name, string $license, ?int $price = 100) : stdClass { //? parametrs var but null
    $weapon = new stdClass();
    $weapon->name = $name;
    $weapon->license = $license;
    $weapon->price = $price;
    return $weapon;
}

$weapons = [
    0 => createWeapon('Pistol', 'A'),
    1 => createWeapon('AK47', 'B', 250),
    2 => createWeapon('Knife', 'D', 50),
];

$licenseText = implode(",", $customer->licenses);
echo "Welcome, {$customer->name} ({$customer->money}) [$licenseText]";

echo PHP_EOL;
echo PHP_EOL;

foreach ($weapons as $key => $weapon) {
    echo "[{$key}]{$weapon->name} ({$weapon->price}$) [{$weapon->license}]" . PHP_EOL;
}

$selection = (int) readline('Enter weapon to purchase: ');

$selectedWeapon = $weapons[$selection];

if ($selectedWeapon === null) {
    echo 'invalid choice';
    exit;
}

if ($customer->money < $selectedWeapon->price) {
    echo 'insufficient funds';
    exit;
}

if (! in_array($selectedWeapon->license, $customer->licenses)) {
    echo 'invalid license';
    exit;
}

$customer->money -= $selectedWeapon->price;

echo "danke";
