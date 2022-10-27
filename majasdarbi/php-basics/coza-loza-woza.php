<?php

for ($i = 1; $i <= 110; $i++) {
    if ($i % 3 === 0) {
        echo "Coza"; echo ' ';
    } else if ($i % 5 === 0) {
        echo "Loza"; echo ' ';
    } else if ($i % 7 === 0) {
        echo "Woza"; echo ' ';
    }

    if ($i % 11 === 0) {
        echo $i; echo PHP_EOL;
    } else {
        echo $i; echo ' ';
    }
}

