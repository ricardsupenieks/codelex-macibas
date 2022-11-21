<?php

require_once "app/Symbols.php";
require_once "app/Screen.php";
require_once "app/Game.php";

class Game{
    private int $playerCash = 0;
    private array $totalCashWon = [];
    private int $timesSpun = 1;
    private array $combinations = [
        [[0], [1], [2], [3], [4]],
        [[5], [6], [7], [8], [9]],
        [[10], [11], [12], [13], [14]],

        [[0], [6], [12], [8], [4]],
        [[10], [6], [2], [8], [14]]

    ];

    //getters
    public function getPlayerCash(): int{
        return $this->playerCash;
    }

    public function getTimesSpun(): int{
        return $this->timesSpun;
    }

    public function getTotalCashWon(): array{
        return $this->totalCashWon;
    }

    //setters
    public function setPlayerCash($amount){
        $this->playerCash = $amount;
        return $this->playerCash;
    }

    public function setTimesSpun(int $timesSpun): void{
        $this->timesSpun = $timesSpun;
    }


    public function win(){
        $screen = new Screen();
        $symbols = new Symbols();

        foreach ($this->combinations as $combination) {
            $combinationCounter = 0;

            [$window] = $combination[0];
            $symbol = $screen->getScreen()[$window];

            foreach ($combination as $position) {
                [$x] = $position;
                if ($screen->getScreen()[$x] !== $symbol) {
                    break;
                }
                $combinationCounter++;
            }

            if ($combinationCounter === 15 || $combinationCounter === 10 || $combinationCounter === 5) {
                echo "WIN WIN WIN" . PHP_EOL;
                $win = $symbols->getSymbols()[$symbol] * $combinationCounter / 5;
                $this->totalCashWon[] = $win;
                echo "You've won $win$!" . PHP_EOL;
            }
        }
    }
}