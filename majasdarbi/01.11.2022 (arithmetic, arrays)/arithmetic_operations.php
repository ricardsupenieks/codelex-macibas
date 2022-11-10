<?php



//EXERCISE 1



echo "########## EXERCISE 1 #################"; echo PHP_EOL . PHP_EOL;

function fifteenChecker(int $number1, int $number2) {
    if (($number1 === 15 || $number2 === 15) || ($number1 + $number2 === 15 || $number1 - $number2 === 15 || $number2 - $number1 === 15)) {
        echo "true"; echo PHP_EOL;
    } else {
        echo "false"; echo PHP_EOL;
    }
};

fifteenChecker(15,1);
fifteenChecker(1, 15);
fifteenChecker(5, 10);
fifteenChecker(25, 10);
fifteenChecker(10, 25);
fifteenChecker(1,1);
fifteenChecker(16, 2); echo PHP_EOL;



// EXERCISE 2



echo "########## EXERCISE 2 #################"; echo PHP_EOL . PHP_EOL;


function checkOddEven (int $number) {
    if ($number % 2 === 0) {
        echo "Even Number"; echo PHP_EOL;
    } else {
        echo "Odd Number"; echo PHP_EOL;
    }
}

checkOddEven(3);
checkOddEven(4); echo PHP_EOL;



// EXERCISE 3



echo "########## EXERCISE 3 #################"; echo PHP_EOL . PHP_EOL;


$lowerBound = 1;
$upperBound = 100;

function sumAverage(int $lowerBound, int $upperBound) {
    $sum = 0;
        for ($i = $lowerBound; $i <= $upperBound; $i++){
        $sum+=$i;
    }
    $average = $sum / $upperBound;
    echo "The sum of {$lowerBound} to {$upperBound} is $sum"; echo PHP_EOL;
    echo "The average is {$average}"; echo PHP_EOL;
}

sumAverage($lowerBound, $upperBound); echo PHP_EOL;



//EXERCISE 4



echo "########## EXERCISE 4 #################"; echo PHP_EOL . PHP_EOL;


function integerProduct(int $from, int $to) {
    $sum = 1;
        for ($i = $from ; $i <= $to; $i++){
        $sum*=$i;
    }
    echo $sum; echo PHP_EOL . PHP_EOL;
}

integerProduct(1, 10);



//EXERCISE 5



echo "########## EXERCISE 5 #################"; echo PHP_EOL . PHP_EOL;


$numbers = range(1, 100);
$computerNumber = array_rand($numbers);

$selectedNumber = readline("I'm thinking of a number between 1 and 100. Try to guess it.");

function numberGuessGame($selectedNumber, $computerNumber) {
    if ($selectedNumber === $computerNumber) {
        echo "Correct"; PHP_EOL;
    } else if ($selectedNumber > $computerNumber) {
        echo "Too high. I was thinking of $computerNumber"; echo PHP_EOL;
    } else {
        echo "Too low. I was thinking of $computerNumber"; echo PHP_EOL;
    }
}

numberGuessGame($selectedNumber, $computerNumber); echo PHP_EOL;



//EXERCISE 6



echo "########## EXERCISE 6 #################"; echo PHP_EOL . PHP_EOL;


include 'coza-loza-woza.php';

echo PHP_EOL;

//EXERCISE 7



echo "########## EXERCISE 7 #################"; echo PHP_EOL . PHP_EOL;


function gravityFormula($acceleration, $time, $initialVelocity, $initialPosition) {
    return 0.5 * $acceleration * $time ** 2 + $initialVelocity + $initialPosition;
}

echo gravityFormula(-9.81, 10, 0, 0); echo PHP_EOL . PHP_EOL;



//EXERCISE 8



echo "########## EXERCISE 8 #################"; echo PHP_EOL . PHP_EOL;


class Employee {
    public $hoursWorked;
    public $basePay;

    public function totalPayCalculator($basePay, $hoursWorked) {
        if ($basePay < 8) {
            return 'error: base pay is less than minimum wage';
        }

        if ($hoursWorked <= 40) {
            return $basePay * $hoursWorked;
        } else if ($hoursWorked <= 60){
            return ($basePay * 40) + (($hoursWorked - 40) * $basePay * 1.5);
        } else {
            return 'error: too many hours worked';
        }
    }


    public function totalPay($employee) {
        return $this->totalPayCalculator($employee->basePay, $employee->hoursWorked);
    }
}

function createEmployee($name, $hoursWorked, $basePay) {
    $employee = new Employee();
    $employee->name = $name;
    $employee->hoursWorked = $hoursWorked;
    $employee->basePay = $basePay;
    return $employee;

}

$employees = [
    createEmployee('Bob', 35, 7.50),
    createEmployee('Rob', 47, 8.20),
    createEmployee('Oto', 73, 10),
];

foreach ($employees as $employee) {
    echo $employee->totalPay($employee); echo PHP_EOL . PHP_EOL;
}



//EXERCISE 9



echo "########## EXERCISE 9 #################"; echo PHP_EOL . PHP_EOL;


$weight = readline("input your weight (lbs): ");
$height = readline("input your height (in): ");

function BMICalculator($weight, $height) {
    $BMI = ($weight * 703) / $height ** 2;

    if (!is_numeric($weight) || !is_numeric($height)) {
        echo "input numbers only"; echo PHP_EOL;
        exit;
    }

    if ($BMI < 18.5) {
        echo 'ur underweight'; echo PHP_EOL;
    } else if ($BMI > 25) {
        echo 'ur fat'; echo PHP_EOL;
    } else {
        echo 'ur good'; echo PHP_EOL;
    }
}

BMICalculator($weight, $height); echo PHP_EOL;



//EXERCISE 10



echo "########## EXERCISE 10 #################"; echo PHP_EOL . PHP_EOL;

function error($parameters) {
    $numOfParameters = func_num_args();
    for($i = 0; $i < $numOfParameters; $i++) {
        $parameter = func_get_arg($i);
        if ($parameter < 0) {
            echo "error, used negative values";
        }
    }
}

class Geometry {
    public $radius;
    public $rectangleWidth;
    public $rectangleHeight;
    public $triangleBase;
    public $triangleHeight;

    public static function areaOfCircle($radius) {
        error($radius);
        return 3.14159265359 * $radius * 2;
    }

    public static function areaOfRectangle($rectangleHeight, $rectangleWidth) {
        error($rectangleHeight, $rectangleWidth);
        return $rectangleHeight * $rectangleWidth;
    }

    public static function areaOfTriangle($triangleBase, $triangleHeight) {
        error($triangleBase, $triangleHeight);
        return $triangleBase * $triangleHeight * 0.5;
    }
}


echo "Geometry calculator:"; echo PHP_EOL. PHP_EOL;

echo "Calculate the Area of a Circle" . PHP_EOL .
     "Calculate the Area of a Rectangle" . PHP_EOL .
     "Calculate the Area of a Triangle" . PHP_EOL .
     "Quit"; echo PHP_EOL;

$input = readline("Enter your choice (1-4): ");

if ($input == 1) {
    $circle = new Geometry();

    $circle->radius = readline("Enter the radius of the circle:");

    echo "Area of radius: " . $circle->areaOfCircle($circle->radius); echo PHP_EOL;
    } else if ($input == 2) {
        $rectangle = new Geometry();

        $rectangle->rectangleWidth = readline("Enter the width of the rectangle:");
        $rectangle->rectangleHeight = readline("Enter the height of the rectangle:");

        echo "Area of rectangle: " . $rectangle->areaOfRectangle($rectangle->rectangleWidth, $rectangle->rectangleHeight); echo PHP_EOL;
    } else if ($input == 3) {
        $triangle = new Geometry();

        $triangle->triangleHeight = readline("Enter the height of the triangle:");
        $triangle->triangleBase = readline("Enter the base of the triangle:");

        echo "Area of triangle: " . $triangle->areaOfTriangle($triangle->triangleHeight, $triangle->triangleBase); echo PHP_EOL;
    } else if ($input == 4) {
        exit;
    } else {
    echo "invalid input";
}    
