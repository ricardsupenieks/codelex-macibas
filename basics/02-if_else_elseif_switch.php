<?php

$n = "<br>";

function isTheSame($varOne, $varTwo) { // kpc te nevar to ternary operaatoru?
    if ($varOne === $varTwo) {
        return "true";
    } else {
        return "false";
    }
}

function isInRange($int, $y, $z) {
    if ($int >= $y && $int <= $z) {
        return "true";
    } else {
        return "false";
    }
}

function isHello($string){
    if ($string === "hello") {
        return "world";
    } else {
        return "not world";
    }
}

function sentenceChecker($sentence) {
    if (preg_match('/[0-9]+/', $sentence)) {
        return "sentence can not have numerical values";
    } else if (strlen($sentence) > 50) {
        return "sentences are limited to 50 characters";
    } else if (preg_match('/[\'^£$%&*()}{@#~?><,|=_+¬-]+/', $sentence)) {
        return "sentence can not have special characters";
    } else {
        return $sentence;
    }
}

function plateNumberChecker($plateNumber) {
    $plateNumber = str_replace('-', ' ', strtolower('FU8115'));
    switch ($plateNumber) {
        case 'fu8115':
            echo "this is your plate number";
            break;
        default:
            echo "this is not your plate number";
    }
}

function lowMediumHigh($int) {
    switch($int){
        case $int < 50:
            echo "low";
            break;
        case $int >= 50 && $int < 100:
            echo "medium";
            break;
        case $int >= 100:
            echo "high";
            break;
    }
}

echo isTheSame(10, "10") . $n;
echo isInRange(50, 1, 100) . $n;
echo isHello("hello") . $n;
echo sentenceChecker("hello world") . $n;
echo plateNumberChecker("fU8115") . $n;
echo lowMediumHigh(101) . $n;
