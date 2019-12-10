<?php

namespace DeskWorks\Pricing\Domain\CalculationMethod;

use DeskWorks\Pricing\Domain\CalculationMethod;
use Money\Money;

class Flat implements CalculationMethod
{
    /**
     * @var Money
     */
    private $cost;

    /**
     * Flat constructor.
     * @param Money $cost
     */
    public function __construct(Money $cost)
    {
        $this->cost = $cost;
    }

    public function calculate(int $amount): Money
    {
        return $this->cost;
    }
}