<?php
require_once "vendor/autoload.php";
use App\CSV;
use App\Company;

$csv = new CSV();
$csv->formatCSV('register.csv');
$csv->setLimit(0, 30);
$records = $csv->getRecords();

$companies = [];

foreach($records as $record) {
    $companies []= new Company($record["name"], $record["regcode"]);
}

echo "[0] Search by registration code" . PHP_EOL;
echo "[1] Search by company name" . PHP_EOL;
echo "[2] Show all companies" . PHP_EOL;


$answer = readline();

if($answer == "0") {
    $registrationCode = readline("Enter registration code: ");
    foreach ($companies as $company) {
        if ($company->getRegistrationCode() == $registrationCode) {
            echo "{$company->getRegistrationCode()} | {$company->getName()}" . PHP_EOL;
        }
    }
} else if ($answer == "1") {
    $companyName = readline("Company name: ");
    foreach ($companies as $company) {
        if ($company->getName() == $companyName) {
            echo "{$company->getRegistrationCode()} | {$company->getName()}" . PHP_EOL;
        }
    }
} else if ($answer == "2") {
    foreach ($companies as $company) {
        echo "{$company->getRegistrationCode()} | {$company->getName()}" . PHP_EOL;
    }
} else {
    echo "incorrect selection";
    exit;
}

