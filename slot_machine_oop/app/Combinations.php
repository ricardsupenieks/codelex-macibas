<?php

namespace App;

class Combinations{
    private array $combinations = [
        [[0,0],[0,1],[0,2],[0,3],[0,4]],
        [[1,0],[1,1],[1,2],[1,3],[1,4]],
        [[2,0],[2,1],[2,2],[2,3],[2,4]],

        [[0,0],[1,1],[2,2],[1,3],[0,4]],
        [[2,0],[1,1],[0,2],[1,3],[2,4]]
    ];

    public function getCombinations(): array
    {
        return $this->combinations;
    }

}
