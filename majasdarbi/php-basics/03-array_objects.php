<?php
$n = "<br>";

$numbers = [1, 2, 3];
echo array_sum($numbers) . $n;

$person = [
    "name" => "John",
    "surname" => "Doe",
    "age" => 50
];

var_dump($person); echo $n;

$person = new stdClass();
$person->name = "John";
$person->surname = "Doe";
$person->age = 50;

var_dump($person); echo $n;

$personInfo = [[["name" => "John", "surname" => "Doe", "age" => 50], ["name" => "Jane", "surname" => "Doe", "age" => 41]]];

$jane = $personInfo[0][1];

$jane = implode(' ', $jane);

echo $jane; echo $n;

$john = $personInfo[0][0];

$john = implode(' ', $john);

$john = str_replace("Doe", '', $john);

$does = $john . "& " . $jane . '\'s';

$does = preg_replace('/[0-9]+/', '', $does);

echo $does;


