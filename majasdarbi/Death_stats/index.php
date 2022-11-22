<?php
require_once "Data.php";
require_once "Row.php";
require_once "Table.php";

$csv = file(''); // input csv file location
$database = [];

foreach ($csv as $line) {
    $database[]= str_getcsv($line);
}

foreach ($database as $data) {
    if ($data[2] == "Vardarbīga nāve"){
        $causes = substr($data[4], 0,strpos ($data[4], ";")) . "; " .str_replace(";", "; ", $data[5]);
    } else {
        $causes = str_replace(";", "; ", $data[3]);
    }
    $rows[] = new Row($data[1], $data[2], $causes);
    $table = new Table($data[1], $data[2], $causes);

    echo $table->boardInfo() . PHP_EOL;
}
