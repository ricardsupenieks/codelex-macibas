<?php

namespace App;
use League\Csv\Reader;
use League\Csv\Statement;

class CSV {
    private Reader $csv;
    private $limit;

    public function formatCSV($CSVPath)
    {
        $this->csv = Reader::createFromPath($CSVPath, 'r');
        $this->csv->setDelimiter(";");
        $this->csv->setHeaderOffset(0);
    }

    public function setLimit(int $from, int $limit)
    {
        $this->limit = Statement::create()->offset($from)->limit($limit);
    }

    public function getRecords()
    {
        $this->csv->getRecords(); //returns all the CSV records as an Iterator object
        return $this->limit->process($this->csv);
    }
}