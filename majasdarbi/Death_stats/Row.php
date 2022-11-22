<?php
class Row extends Data {

    public function date(): string {
        return "Datums: {$this->getDate()}";
    }

    public function category(): string{
        if ($this->getCategory() == "Vardarbīga nāve") {
            return " | Nāves kategorija: {$this->getCategory()}  "; //atstarpe beigas prieks parlasamibas
        }
        return " | Nāves kategorija: {$this->getCategory()}";
    }

    public function cause(): string {
        if($this->getCategory() == "Nāves cēlonis nav noteikts") {
            return "";
        }
        return " | Nāves iemesls: " . $this->getCauses();
    }
}

class Board extends Row {
    public function boardInfo(): string {
        return $this->date() . $this->category() . $this->cause() ;
    }
}
