<?php

namespace DeskWorks\Pricing\Domain\CalculationMethod;

use DeskWorks\Pricing\Domain\CalculationMethod;
use Money\Money;

class Linear implements CalculationMethod
{
    /**
     * @var Money
     */
    private $cost;
    /**
     * @var int
     */
    private $unitSize;

    /**
     * Flat constructor.
     * @param Money $cost
     * @param int $unitSize
     */
    public function __construct(Money $cost, int $unitSize = 1)
    {
        $this->cost = $cost;
        $this->unitSize = $unitSize;
    }

    public function calculate(int $amount): Money
    {
        return $this->cost->multiply(ceil($amount / $this->unitSize));
    }
}