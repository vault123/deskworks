<?php

namespace DeskWorks\Pricing\Domain;

use Money\Money;

interface CalculationMethod
{
    public function calculate(int $amount): Money;
}