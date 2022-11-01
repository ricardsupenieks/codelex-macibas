<?php



// EXERCISE 1

echo "########## EXERCISE 1 ################# "; echo PHP_EOL; echo PHP_EOL;

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2165, 1457, 2456
];

//todo
echo "Original numeric array: " . implode( ', ', $numbers); echo PHP_EOL;

$numbersSorted = sort($numbers);

function echoNumbers($numbersSorted) {
    foreach ($numbersSorted as $number) {
        echo $number; echo ', ';
    }
}

//todo
echo "Sorted numeric array:  " ;
echo echoNumbers($numbers) ; echo PHP_EOL;

$words = [
    "Java",
    "Python",
    "PHP",
    "C#",
    "C Programming",
    "C++"
];

//todo
echo "Original string array: " . implode(', ', $words); echo PHP_EOL;

$wordsSorted = sort($words);

function echoWord($wordsSorted) {
    foreach ($wordsSorted as $word) {
        echo $word; echo ', ';
    }
}

//todo
echo "Sorted string array: ";
echo echoWord($words) ; echo PHP_EOL; echo PHP_EOL;



// EXERCISE 2



echo "########## EXERCISE 2 #################"; echo PHP_EOL; echo PHP_EOL;

$numbers = [20, 30, 25, 35, -16, 60, -100];

//todo calculate an average value of the numbers
$numberAmount = count($numbers);
$numbersSum = array_sum($numbers);
$numbersAverage = $numbersSum / $numberAmount;
echo $numbersAverage; echo PHP_EOL . PHP_EOL;



// EXERCISE 3



echo "########## EXERCISE 3 #################"; echo PHP_EOL; echo PHP_EOL;

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2265, 1457, 2456
];

//echo "Enter the value to search for: ";

//todo check if an array contains a value user entered

$userValue = readline("Enter the value to search for:  ");

if (in_array($userValue, $numbers)) {
    echo "Array contains value " . $userValue ; echo PHP_EOL;
} else {
    echo "The array does not contain selected value"; echo PHP_EOL;
}

echo PHP_EOL;



// EXERCISE 4



echo "########## EXERCISE 4 #################"; echo PHP_EOL; echo PHP_EOL;

$integers = [];

for ($i = 0; $i < 10; $i++) {
    $integers[]= rand(1, 100);
}

$integersCopy = $integers;

$integers[array_key_last($integers)] = -7;

echo implode(", ", $integers); echo PHP_EOL;
echo implode(", ", $integersCopy); echo PHP_EOL . PHP_EOL;



// EXERCISE 5



echo "########## EXERCISE 5 #################"; echo PHP_EOL; echo PHP_EOL;

error_reporting(E_ALL & ~E_NOTICE);

$blocks = [
    [[], [], []],
    [[], [], []],
    [[], [], []]
];

$cells = $blocks[0];

$turns = 0;
$maxTurns = 9;
$turnDone = null;


function display_board() {
    global $cells;

    echo "==================== \n";
    echo " {$cells[0][0]} | {$cells[0][1]} | {$cells[0][2]} \n";
    echo "---+---+---\n";
    echo " {$cells[1][0]} | {$cells[1][1]} | {$cells[1][2]} \n";
    echo "---+---+---\n";
    echo " {$cells[2][0]} | {$cells[2][1]} |  {$cells[2][2]} \n";
}

function xPutter() {
    global $cells, $turns, $turnDone;

    do {
        $turnDone = false;
        $x = readline("'X', choose your location (row, column): ");

        $x = str_replace(' ', '', $x);
        $x = str_split($x);

        if (in_array("-", $x) || ($x[0]) > 2 || $x[1] > 2) {
            echo "Please choose values from 0 to 2"; echo PHP_EOL;
        } else if ($cells[$x[0]][$x[1]] !== null) {
            echo "This spot is already taken"; echo PHP_EOL;
        } else {
            $cells[$x[0]][$x[1]] = 'X';
            $turnDone = true;
        }
    } while ($turnDone === false);
    $turns++;
}

function oPutter() {
    global $cells, $turns, $turnDone;

    do {
        $turnDone = false;
        $o = readline("'O', choose your location (row, column): ");

        $o = str_replace(' ', '', $o);
        $o = str_split($o);

        if (in_array("-", $o) || $o[0] > 2 || $o[1] > 2) {
            echo "Please choose values from 0 to 2"; echo PHP_EOL;
        } else if ($cells[$o[0]][$o[1]] !== null) {
            echo "This spot is already taken"; echo PHP_EOL;
        } else {
            $cells[$o[0]][$o[1]] = 'O';
            $turnDone = true;
        }
    } while ($turnDone === false);
    $turns++;
}

function winner() {
    global $cells, $turns, $maxTurns;

    // if x win horizontal
    if ($cells[0][0] === 'X' && $cells[0][1] === 'X' && $cells[0][2] === 'X') {
        echo "'X' won";
        exit;
    } else if ($cells[1][0] === 'X' && $cells[1][1] === 'X' && $cells[1][2] === 'X') {
        echo "'X' won";
        exit;
    } else if ($cells[2][0] === 'X' && $cells[2][1] === 'X' && $cells[2][2] === 'X') {
        echo "'X' won";
        exit;
    }

    // if x win vertical
     else if ($cells[0][0] === 'X' && $cells[1][0] === 'X' && $cells[2][0] === 'X') {
        echo "'X' won";
        exit;
    } else if ($cells[0][1] === 'X' && $cells[1][1] === 'X' && $cells[2][1] === 'X') {
        echo "'X' won";
        exit;
    } else if ($cells[0][2] === 'X' && $cells[1][2] === 'X' && $cells[2][2] === 'X') {
        echo "'X' won";
        exit;
    }

     // if x diagonal
     else if ($cells[0][0] === 'X' && $cells[1][1] === 'X' && $cells[2][2] === 'X') {
        echo "'X' won";
        exit;
    } else if ($cells[0][2] === 'X' && $cells[1][1] === 'X' && $cells[2][0] === 'X') {
        echo "'X' won";
        exit;
    }


    // if o horizontal
    else if ($cells[0][0] === 'O' && $cells[0][1] === 'O' && $cells[0][2] === 'O') {
        echo "'O' won";
        exit;
    } else if ($cells[1][0] === 'O' && $cells[1][1] === 'O' && $cells[1][2] === 'O') {
        echo "'O' won";
        exit;
    } else if ($cells[2][0] === 'O' && $cells[2][1] === 'O' && $cells[2][2] === 'O') {
        echo "'O' won";
        exit;
    }

    //if o vertical
    else if ($cells[0][0] === 'O' && $cells[1][0] === 'O' && $cells[2][0] === 'O') {
        echo "'O' won";
        exit;
    } else if ($cells[0][1] === 'O' && $cells[1][1] === 'O' && $cells[2][1] === 'O') {
        echo "'O' won";
        exit;
    } else if ($cells[0][2] === 'O' && $cells[1][2] === 'O' && $cells[2][2] === 'O') {
        echo "'O' won";
        exit;
    }

    //if o diagonal
    else if ($cells[0][0] === 'O' && $cells[1][1] === 'O' && $cells[2][2] === 'O') {
        echo "'O' won";
        exit;
    } else if ($cells[0][2] === 'O' && $cells[1][1] === 'O' && $cells[2][0] === 'O') {
        echo "'O' won";
        exit;
    }

    if ($turns === $maxTurns) {
        echo "Tie"; echo PHP_EOL;
        exit;
    }

}

function playGame() {
    display_board();
    xPutter();
    display_board();
    winner();
    oPutter();
    display_board();
    winner();
}


while ($turns <= $maxTurns) {
    playGame();
}




//EXERCISE 6


echo "########## EXERCISE 6 #################"; echo PHP_EOL; echo PHP_EOL;

$words = [
    "sky",
    "fire",
    "weight",
    "railroad",
    "cup",
    "determination",
    "cucumber"
];

$word = $words[array_rand($words)];
$letters = str_split($word);
$correctWord = str_split(str_repeat('_', strlen($word)));

$guesses = 0;
$maxGuesses = 10;

$misses = [];

while ($guesses !== $maxGuesses && in_array("_", $correctWord)) {

    echo str_repeat("-=", 13); echo PHP_EOL . PHP_EOL;
    echo "Word: " . implode($correctWord); echo PHP_EOL . PHP_EOL;
    echo "Misses: " . implode(", ", $misses); echo PHP_EOL . PHP_EOL;

    $letter = readline("Guess: ");
    $letter = strtolower($letter);
    $letterPosition = array_keys($letters, $letter);

    if ($letterPosition == null) {
        $misses[]= $letter;
    } else {
        foreach ($letterPosition as $position) {
            $correctWord[$position] = $letter;
        }
    }

    $guesses++;
}

if (in_array("_", $correctWord)) {
        echo PHP_EOL;
        echo str_repeat("-=", 13); echo PHP_EOL;
        echo "you lose"; echo PHP_EOL;
    } else {
        echo PHP_EOL;
        echo str_repeat("-=", 13); echo PHP_EOL;
        echo "you win"; echo PHP_EOL;
    }
