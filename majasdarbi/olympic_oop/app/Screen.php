<?php

require_once "app/Symbols.php";

class Screen{
    private array $screen = [' ', ' ', ' ', ' ', ' ',
                               ' ', ' ', ' ', ' ', ' ',
                               ' ', ' ', ' ', ' ', ' '];


    public function getScreen(): array
    {
        return $this->screen;
    }

    public function getWindow($key)
    {
        $symbol = new Symbols();
        return $this->screen[$key] = $symbol->getRandomSymbol();
    }

    function displayScreen(){
        return  "_____________________ \n" .
                "| {$this->screen[0]} | {$this->screen[1]} | {$this->screen[2]} | {$this->screen[3]} | {$this->screen[4]} | \n" .
                "--------------------- \n" .
                "| {$this->screen[5]} | {$this->screen[6]} | {$this->screen[7]} | {$this->screen[8]} | {$this->screen[9]} | \n" .
                "--------------------- \n" .
                "| {$this->screen[10]} | {$this->screen[11]} | {$this->screen[12]} | {$this->screen[13]} | {$this->screen[14]} | \n" .
                "--------------------- \n" . PHP_EOL;
    }
}