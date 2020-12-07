<?php

declare(strict_types=1);

namespace App\Tests\Service;

use App\Service\CalculatorService;
use LogicException;

class CalculatorServiceTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function sum7plus8()
    {
        $service = new CalculatorService();

        $expected = 15;
        $actual = $service->sum(7, 8);

        self::assertEquals($actual, $expected);
    }

    /**
     * @test
     */
    public function div4by0()
    {
        $service = new CalculatorService();

        $this->expectException(LogicException::class);
        $actual = $service->div(4, 0);
    }
}