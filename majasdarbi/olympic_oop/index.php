<?php

require_once "app/Screen.php";
require_once "app/Symbols.php";
require_once "app/Game.php";

echo "Each spin will cost 100$" . PHP_EOL;

$screen = new Screen();
$symbols = new Symbols();
$game = new Game();

while (true) {
    $game->setPlayerCash(readline("Enter amount of cash you will play with (min = 100): "));
    while ($game->getPlayerCash() < 100) {
        $game->setPlayerCash(readline("Please enter more or equal than the minimum amount (100): "));
    }

    $win = 0;

    $timesSpun = $game->getTimesSpun();

    $totalCashWon = $game->getTotalCashWon();

    do {
        for ($i = 0; $i < count($screen->getScreen()); $i++) {
            $screen->getWindow($i);
        }

        echo $screen->displayScreen();

        $game->win();

        echo "Player balance: ";
        $cash = $game->setPlayerCash($game->getPlayerCash() - 100 * $game->getTimesSpun() + array_sum($game->getTotalCashWon()));
        echo $cash . PHP_EOL;

        if ($cash < 100) {
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
        $game->setTimesSpun(+1);

    } while ($game->getPlayerCash() >= 100);
}
