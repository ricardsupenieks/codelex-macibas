<?php

require_once "vendor/autoload.php";

use App\Symbols;
use App\Combinations;

$symbols = new Symbols();
$combinations = new Combinations();

$screen = [
    [' ', ' ', ' ', ' ', ' '],
    [' ', ' ', ' ', ' ', ' '],
    [' ', ' ', ' ', ' ', ' '],
    ];

function displayScreen() : string{
    global $screen;
    return "_____________________ \n" .
        "| {$screen[0][0]} | {$screen[0][1]} | {$screen[0][2]} | {$screen[0][3]} | {$screen[0][4]} | \n" .
        "--------------------- \n" .
        "| {$screen[1][0]} | {$screen[1][1]} | {$screen[1][2]} | {$screen[1][3]} | {$screen[1][4]} | \n" .
        "--------------------- \n" .
        "| {$screen[2][0]} | {$screen[2][1]} | {$screen[2][2]} | {$screen[2][3]} | {$screen[2][4]} | \n" .
        "--------------------- \n" . PHP_EOL;
}


function winner(){
    global $combinations, $symbols, $screen, $totalCashWon;

    foreach ($combinations->getCombinations() as $combination) {
        $combinationCounter = 0;

        [$symbolX, $symbolY] = $combination[0];
        $symbol = $screen[$symbolX][$symbolY];

        foreach ($combination as $position) {
            [$x, $y] = $position;
            if ($screen[$x][$y] !== $symbol) {
                break;
            }
            $combinationCounter++;
        }
        if ($combinationCounter === 15 || $combinationCounter === 10 || $combinationCounter === 5) {
            echo "WIN WIN WIN" . PHP_EOL;
            $win = $symbols->getSymbols()[$symbol] * $combinationCounter / 5;
            $totalCashWon[] = $win;
            echo "You've won $win$!" . PHP_EOL;
        }
    }
}

function insertSymbol(int $rows, int $columns): void
{
    global $screen, $symbols;
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $columns; $j++) {
            $screen[$i][$j] = $symbols->getRandomSymbol();
        }
    }
}

echo "Each spin will cost 100$" . PHP_EOL;

while (true) {
    $playerCash = readline("Enter the amount of money you will play with (min = 100): ");
    while ($playerCash < 100) {
        $playerCash = readline("Please enter more or equal than the minimum amount (100): ");
    }

    $win = 0;

    $timesSpun = 1;

    $totalCashWon = [];

    do {

        insertSymbol(3,5);

        echo displayScreen();

        winner();

        echo "Player balance: ";
        echo $playerCash - 100 * $timesSpun + array_sum($totalCashWon) . PHP_EOL;

        if ($playerCash - 100 * $timesSpun + array_sum($totalCashWon) < 100) {
            echo "Not enough cash to continue playing" . PHP_EOL;
            echo "Would you like to insert more cash?  Yes (Enter) \ No (Any button)";
            echo PHP_EOL;
            $answer = readline();
            $answer = strtolower($answer);
            if ($answer !== "") {
                exit;
            } else {
                break;
            }
        }

        echo "Would you like to spin again?  Yes (Enter) \ No (Any button) ";
        echo PHP_EOL;
        $input = readline();
        $input = strtolower($input);
        if ($input !== "") {
            exit;
        }
        $timesSpun++;

    } while ($playerCash > 99);
}
