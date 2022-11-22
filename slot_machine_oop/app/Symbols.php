<?php

namespace App;

class Symbols {
    private array $symbols = ['*' => 200, '+' => 500, '%' => 1000, '$' => 2000];

    public function getSymbols(): array
    {
        return $this->symbols;
    }

    public function getRandomSymbol(): string{
        $randomNumber = rand(0, 100);
        if (in_array($randomNumber, range(0, 50))) {
            return "*";
        }
        if (in_array($randomNumber, range(51, 75))) {
            return "+";
        }
        if (in_array($randomNumber, range(76, 95))) {
            return "%";
        }
        return "$";
    }
}
