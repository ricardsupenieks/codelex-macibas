<?php



// EXERCISE 1


echo "########## EXERCISE 1 #################"; echo PHP_EOL; echo PHP_EOL;


$numbers = [];

$numberOne = readline("Input the 1st number: ");

$numbers[]= $numberOne;

$numberTwo = readline("Input the 2nd number: ");

$numbers[]= $numberTwo;

$numberThree = readline("Input the 3rd number: ");

$numbers[]= $numberThree;

echo max($numbers); echo PHP_EOL;



//EXERCISE 2


echo "########## EXERCISE 2 #################"; echo PHP_EOL; echo PHP_EOL;


$number = readline("Enter number: ");

if ($number > 0) {
    echo "number is positive"; echo PHP_EOL;
} else {
    echo "number is negative"; echo PHP_EOL;
}



//EXERCISE 3


echo "########## EXERCISE 3 #################"; echo PHP_EOL; echo PHP_EOL;


do {
    $positiveInteger = readline("enter positive integer: ");

    if ((int)$positiveInteger < 0 || (int)is_float($positiveInteger)) {
        echo "please enter positive integer only";
    }
} while ($positiveInteger < 0 || is_float($positiveInteger));

echo strlen($positiveInteger); echo PHP_EOL;



//EXERCISE 4


echo "########## EXERCISE 4 #################"; echo PHP_EOL; echo PHP_EOL;


(int) $dayNumber = readline("Write day number(0-6): ");

switch ($dayNumber) {
    case 0:
        echo "Monday"; echo PHP_EOL;
        break;
    case 1:
        echo "Tuesday"; echo PHP_EOL;
        break;
    case 2:
        echo "Wednesday"; echo PHP_EOL;
        break;
    case 3:
        echo "Thursday"; echo PHP_EOL;
        break;
    case 4:
        echo "Friday"; echo PHP_EOL;
        break;
    case 5:
        echo "Saturday"; echo PHP_EOL;
        break;
    case 6:
        echo "Sunday"; echo PHP_EOL;
        break;
    default:
        echo "Invalid day number"; echo PHP_EOL;
}



//EXERCISE 5


echo "########## EXERCISE 5 #################"; echo PHP_EOL; echo PHP_EOL;

$keyPad = [
    "2" => ["a", "b", "c"],
    "3" => ["d", "e", "f"],
    "4" => ["g", "h", "i"],
    "5" => ["j", "k", "l"],
    "6" => ["m", "n", "o"],
    "7" => ["p", "q", "r", "s"],
    "8" => ["t", "u", "v"],
    "9" => ["w", "x", "y", "z"],
    " " => [" "],
];

$input = readline("Input: ");
$input = strtolower($input);
$input = str_split($input);

foreach ($input as $inputLetter) {
    foreach ($keyPad as $number => $letters) {
        foreach ($letters as $letter) {
            if (is_numeric($inputLetter)) {
                echo "please input letters only";
                exit;
            } else {
                if ($inputLetter === $letter) {
                    echo str_repeat($number, array_search($letter, $letters) + 1);
                    echo ' ';
                }
            }
        }
    }
}        

echo PHP_EOL . PHP_EOL;
