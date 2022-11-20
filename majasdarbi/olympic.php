<?php

$screen = [
    ' ', ' ', ' ', ' ', ' ',
    ' ', ' ', ' ', ' ', ' ',
    ' ', ' ', ' ', ' ', ' ',
    ' ', ' ', ' ', ' ', ' '
];

function displayScreen()
{
    global $screen;

    echo "_____________________ \n";
    echo "| $screen[0] | $screen[1] | $screen[2] | $screen[3] | $screen[4] | \n";
    echo "--------------------- \n";
    echo "| $screen[5] | $screen[6] | $screen[7] | $screen[8] | $screen[9] | \n";
    echo "--------------------- \n";
    echo "| $screen[10] | $screen[11] | $screen[12] | $screen[13] | $screen[14] | \n";
    echo "--------------------- \n";
    echo PHP_EOL;
}

$symbols = ['*' => 200, '+' => 500, '%' => 1000, '$' => 2000];

$combinations = [
    [[0],[1],[2],[3],[4]],
    [[5],[6],[7],[8],[9]],
    [[10],[11],[12],[13],[14]],

    [[0],[6],[12],[8],[4]],
    [[10],[6],[2],[8],[14]]

];

function winner()
{
    global $combinations, $symbols, $screen, $totalCashWon;

    foreach ($combinations as $combination) {
        $combinationCounter = 0;

        [$window] = $combination[0];
        $symbol = $screen[$window];

        foreach ($combination as $position) {
            [$x] = $position;
            if ($screen[$x] !== $symbol) {
                break;
            }
            $combinationCounter++;
        }
        if ($combinationCounter === 15 || $combinationCounter === 10 || $combinationCounter === 5) {
            echo "WIN WIN WIN" . PHP_EOL;
            $win = $symbols[$symbol] * $combinationCounter / 5;
            $totalCashWon[] = $win;
            echo "You've won $win$!" . PHP_EOL;
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
        for ($i = 0; $i < 15; $i++) {
            $randomNumber = rand(0, 100);
            if (in_array($randomNumber, range(0, 50))) {
                $screen[$i] = "*";
            } else if (in_array($randomNumber, range(51, 75))) {
                $screen[$i] = "+";
            } else if (in_array($randomNumber, range(76, 95))) {
                $screen[$i] = "%";
            } else if (in_array($randomNumber, range(95, 100))) {
                $screen[$i] = "$";
            }
        }


        displayScreen();

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
