<?php

// EXERCISE 1



echo "########## EXERCISE 1 #################"; echo PHP_EOL; echo PHP_EOL;


for($i = 1; $i <= 10; $i++) {
    echo $i;
}



// EXERCISE 2



echo "########## EXERCISE 2 #################"; echo PHP_EOL; echo PHP_EOL;


$number = 8;
$times = 6;
$result = 0;
for($i = 1; $i <= $times; $i++) {
    $result+= $number * $i;
}
echo $result . PHP_EOL . PHP_EOL;



// EXERCISE 3



echo "########## EXERCISE 3 #################"; echo PHP_EOL; echo PHP_EOL;


echo "Enter first word:";
$firstWord = readline();

echo "Enter second word:";
$secondWord = readline();

$lineLength = 30;

echo $firstWord;

$numOfDots = $lineLength - strlen($firstWord) - strlen($secondWord);

for ($i = 0; $i < $numOfDots; $i++) {
    echo ".";
}

echo $secondWord; echo PHP_EOL . PHP_EOL;



// EXERCISE 4



echo "########## EXERCISE 4 #################"; echo PHP_EOL; echo PHP_EOL;


class FizzBuzz {
    public int $userInteger;
    public function fizzBuzzProgram() {
        for($i = 1; $i <= $this->userInteger; $i++) {
            if ($i % 3 === 0 && $i % 5 === 0) {
                echo "FizzBuzz ";
            } else if ($i % 3 === 0) {
                echo "Fizz ";
            } else if ($i % 5 === 0) {
                echo "Buzz ";
            } else {
                echo $i . " ";
            }

            if ($i % 20 === 0) {
                echo PHP_EOL;
            }
        }
    }

}

$test = new FizzBuzz();
$test->userInteger = 100;
echo $test->fizzBuzzProgram();



// EXERCISE 5



echo "########## EXERCISE 5 #################"; echo PHP_EOL; echo PHP_EOL;


class Piglet {
    public $playerPoints;

    public function __constructor($playerPoints){
        $this->playerPoints = $playerPoints;
    }

    public function playPiglet(){
        echo "Welcome to Piglet!" . PHP_EOL;
        while(true) {
            $dice = rand(1,6);
            echo "You rolled a $dice!" . PHP_EOL;
            if($dice === 1) {
                echo "You got 0 points" . PHP_EOL;
                break;
            }

            $this->playerPoints+=$dice;
            $answer = readline("Roll again?  y \ n " );
            $answer = strtolower($answer);
            if ($answer !== "y") {
                return "You got $this->playerPoints points" . PHP_EOL;
            }
        }
    }
}

$gameOne = new Piglet();

echo $gameOne->playPiglet();


// EXERCISE 6



echo "########## EXERCISE 6 #################"; echo PHP_EOL; echo PHP_EOL;


class AsciiFigure{
    public int $size;

    public function __constructor($size){
        $this->size = $size;
    }

    public function create($size){
        $this->size = $size;
        for ($i = 0; $i < $this->size; $i++) {
            echo str_repeat(chr(47), ($this->size * 3 + $this->size - 4) - 4 * $i) .
                 str_repeat("*", 8 * $i) .
                 str_repeat(chr(92), ($this->size * 3 + $this->size - 4) - 4 * $i);
            echo PHP_EOL;
        }
    }
}

$asciiFigure = new AsciiFigure();
$size = readline("select size: ");
$asciiFigure->create($size);



// EXERCISE 7



echo "########## EXERCISE 7 #################"; echo PHP_EOL; echo PHP_EOL;


class RollTwoDice {
    public $sum;

    public function __constructor($sum){
        $this->sum = $sum;
    }

    public function play(){
        $this->sum = (int) readline("Desired sum: ");
        while (true) {
            $number1 = rand(1, 6);
            $number2 = rand(1, 6);
            $sumOfNumbers = $number1 + $number2;
            echo "$number1 and $number2 = $sumOfNumbers" . PHP_EOL;
            if ($sumOfNumbers === $this->sum) {
                exit;
            }
        }
    }
}

$game = new RollTwoDice();
$game->play();
