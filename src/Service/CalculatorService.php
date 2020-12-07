<?php

declare(strict_types=1);

namespace App\Service;

use LogicException;

class CalculatorService
{
    public function sum(float $a, float $b)
    {
        return $a + $b;
    }

    public function div(float $a, float $b)
    {
        if (0 == $b) {
            return new LogicException('div by 0');
        }

        return $a / $b;
    }
}
