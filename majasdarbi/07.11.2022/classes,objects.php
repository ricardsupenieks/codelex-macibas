<?php

// EXERCISE 1



echo "########## EXERCISE 1 #################"; echo PHP_EOL; echo PHP_EOL;


class Product {
    public $price;
    public $amount;
    public $name;

    public function __construct(string $name, float $price, int $amount) {
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;
    }

    public function printProduct() {
        echo '"' . $this->name . '", ' . $this->price . "EUR, " . $this->amount . " units" . PHP_EOL;
    }

    public function priceChange($newPrice) {
        $this->price = $newPrice;
    }

    public function quantityChange($newQuantity) {
        $this->amount = $newQuantity;
    }

}

$mouse = new Product("Logitech mouse", 70, 14);
$phone = new Product("iPhone 5s", 999.99, 3);
$epson = new Product("Epson EB-U05", 440.46, 1);

$mouse->priceChange(2);
$phone->quantityChange(0);

$mouse->printProduct();
$phone->printProduct();
$epson->printProduct();



// EXERCISE 2



echo "########## EXERCISE 2 #################"; echo PHP_EOL; echo PHP_EOL;


class Point {
    public int $x;
    public int $y;

    public function __construct(int $x, int $y) {
        $this->x = $x;
        $this->y = $y;
    }

    public function swapPoints($point1, $point2) {
        (int) $point1x = $point1->x;
        (int) $point1y = $point1->y;
        (int) $point2x = $point2->x;
        (int) $point2y = $point2->y;

        $point1->x = $point2x;
        $point1->y = $point2y;

        $point2->x = $point1x;
        $point2->y = $point1y;
    }
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);

$p1->swapPoints($p1,$p2);
echo "(" . $p1->x . ", " . $p1->y . ")";
echo PHP_EOL;
echo "(" . $p2->x . ", " . $p2->y . ")";



// EXERCISE 3



echo "########## EXERCISE 3 #################"; echo PHP_EOL; echo PHP_EOL;


class FuelGauge {
    private int $fuel;

    public function __construct(int $fuel) {
        $this->fuel = $fuel;
    }

    public function getAmount(): int{
        return $this->fuel;
    }

    public function fill(int $fillAmount = 1): void {
        if($this->fuel + $fillAmount <= 70) {
            $this->fuel += $fillAmount;
        } else {
            $this->fuel = 70;
        }
    }

    public function use(){
        if($this->fuel > 0) {
            $this->fuel--;
        }
    }
}


class Odometer {
    private int $mileage;

    public function __construct(int $mileage = 0) {
        $this->mileage = $mileage;
    }

    public function getMileage(): int {
        return $this->mileage;
    }

    public function increase(int $amount = 1):int {

        $this->mileage+=$amount;
        if ($this->mileage === 1000000) {
            $this->mileage = 0;
        }
        return $this->mileage;
    }
}

$fuelGauge = new FuelGauge(2);
$odometer = new Odometer();

while ($fuelGauge->getAmount() > 0) {
    echo "1km driven" . PHP_EOL;

    $odometer->increase();

    if ($odometer->getMileage() % 10 === 0) {
        $fuelGauge->use();
        echo "1L used" . PHP_EOL;
    }

}

echo PHP_EOL;


// EXERCISE 4



echo "########## EXERCISE 4 #################"; echo PHP_EOL; echo PHP_EOL;
 


class Movie {
    private string $title;
    private string $studio;
    private string $rating;

    public function __construct(string $title, string $studio, string $rating){
        $this->rating = $rating;
        $this->studio = $studio;
        $this->title = $title;
    }

    public function getRating(): string{
        return $this->rating;
    }

    public function getPG(array $movies): array {
        $filterMovies = [];
        foreach ($movies as $movie) {
            if($movie->getRating() === 'PG') {
                $filterMovies[] = $movie;
            }
        }
        return $filterMovies;
    }
}
$movies = [
    $movie1 = new Movie("Casino Royale", "Eon Productions", "PG13"),
    $movie2 = new Movie("Glass", "Buena Vista", "PG13"),
    $movie3 = new Movie("Spider Man", "Columbia pictures", "PG"),
];

$movie1->getPG($movies);




// EXERCISE 5



echo "########## EXERCISE 5 #################"; echo PHP_EOL; echo PHP_EOL;


class Date {
    private int $month;
    private int $day;
    private int $year;

    public function __construct(int $month, int $day, int $year){
        $this->year = $year;
        $this->day = $day;
        $this->month = $month;
    }

    public function displayDate(){
        return $this->month . "/" . $this->day . "/" . $this->year . PHP_EOL;
    }
}

$date = new Date(02, 14,2990);
echo $date->displayDate();
echo PHP_EOL;



// EXERCISE 6



echo "########## EXERCISE 6 #################"; echo PHP_EOL; echo PHP_EOL;


$surveyed = 12467;
$purchased_energy_drinks = 0.14;
$prefer_citrus_drinks = 0.64;

function calculate_energy_drinkers(int $numberSurveyed, float $purchasedEnergyDrink) {
    return $numberSurveyed * $purchasedEnergyDrink;
}

function calculate_prefer_citrus(int $numberSurveyed, float $purchasedEnergyDrink, float $preferCitrus)
{
    return ($numberSurveyed * $purchasedEnergyDrink) * $preferCitrus;
}


echo "Total number of people surveyed " . $surveyed . PHP_EOL;
echo "Approximately " . calculate_energy_drinkers($surveyed, $purchased_energy_drinks) . " bought at least one energy drink" . PHP_EOL;
echo  calculate_prefer_citrus($surveyed, $purchased_energy_drinks, $prefer_citrus_drinks). " of those " . "prefer citrus flavored energy drinks." . PHP_EOL;

echo PHP_EOL;

// EXERCISE 7



echo "########## EXERCISE 7 #################"; echo PHP_EOL; echo PHP_EOL;


class Dog {
    private string $name;
    private string $sex;
    private string $mother;
    private string $father;

    public function __construct($name, $sex, $mother = "Unknown", $father = "Unknown"){
        $this->name = $name;
        $this->sex = $sex;
        $this->mother = $mother;
        $this->father = $father;
    }

    public function fathersName():string {
        return $this->father;
    }

    public function hasSameMotherAs($dog) {
        if ($this->father === $dog->fathersName()) {
            return "true";
        } else {
            return "false";
        }
    }
}

class DogTest {
    public function createDog(){
        $max = new Dog("Max", "male", "Lady", "Rocky");
        $rocky = new Dog("Rocky", "male", "Molly", "Sam");
        $sparky = new Dog("Sparky", "male");
        $buster = new Dog("Buster", "male", "Lady", "Sparky");
        $sam = new Dog("Sam", "male");
        $lady = new Dog("Lady", "female");
        $molly = new Dog("Molly", "female");
        $coco = new Dog("Coco", "female", "Molly", "Buster");

        return $rocky->hasSameMotherAs($sam);
//        return $rocky->fathersName();

    }
}

$test = new DogTest();
echo $test->createDog() . PHP_EOL;

echo PHP_EOL;



// EXERCISE 8



echo "########## EXERCISE 8 #################"; echo PHP_EOL; echo PHP_EOL;


class SavingsAccount {
    private float $annualInterestRate;
    public float $balance;
    private int $monthsOpened;

    public function __construct($balance, $annualInterestRate, $monthsOpened){
        $this->balance = $balance;
        $this->annualInterestRate = $annualInterestRate;
        $this->monthsOpened = $monthsOpened;
    }

    public function getBalance(): float{
        return $this->balance;
    }

    public function getMonthsOpened(): int{
        return $this->monthsOpened;
    }


    public function withdraw($amount): float{
        return $this->balance - $amount;
    }

    public function deposit($amount): float{
        return $this->balance + $amount;
    }

    public function monthlyInterestRate(): float{
        return $this->balance * ($this->annualInterestRate / 12);
    }
}

$balance = readline("How much money is in the account?: ");
$interestRate = readline("Enter annual interest rate: ");
$months = readline("How long has the account been opened?: ");

$account = new SavingsAccount($balance, $interestRate, $months);

function calculateBalanceAfterXMonths($account) {

    $startingMoney = $account->getBalance();
    $totalDeposited = 0;
    $totalWithdrawn = 0;
    $interestEarned = 0;

    for ($i = 1; $i <= $account->getMonthsOpened(); $i++) {
        $deposited = (float) readline("Enter amount deposited for month: $i: ");
        $totalDeposited = $totalDeposited + $deposited;
        $account->balance = $account->deposit($deposited);

        $withdrawn = (float) readline("Enter the amount withdrawn for month: $i: ");
        $totalWithdrawn = $totalWithdrawn + $withdrawn;
        $account->balance = $account->withdraw($withdrawn);

        $interestEarned = $interestEarned + $account->monthlyInterestRate();
        $account->balance = $account->getBalance() + $account->monthlyInterestRate();

    }
    echo "$" . number_format(round($totalDeposited, 2), 2) . PHP_EOL;
    echo "$" . number_format(round($totalWithdrawn, 2), 2) . PHP_EOL;
    echo "$" . number_format(round($interestEarned, 2), 2) . PHP_EOL;

    $total = $startingMoney + $totalDeposited - $totalWithdrawn + $interestEarned;
    return "$" .  number_format(round($total, 2), 2);
}

echo calculateBalanceAfterXMonths($account);

echo PHP_EOL . PHP_EOL;



// EXERCISE 9



echo "########## EXERCISE 9 #################"; echo PHP_EOL;


class BankAccount{
    private $name;
    private $funds;

    public function __construct(string $name, float $funds){
        $this->name = $name;
        $this->funds = $funds;
    }

    public function show_user_name_and_balance() {
        return $this->name . ", " . "$" . number_format($this->funds, 2);
    }
}

$bob = new BankAccount("bob", 100);
echo $bob->show_user_name_and_balance() . PHP_EOL . PHP_EOL;
