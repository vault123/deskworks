<?php

namespace DeskWorks\Pricing\Application;

use DeskWorks\Pricing\Domain\CalculationMethod\Linear;
use DeskWorks\Pricing\Domain\Pricing;
use DeskWorks\Pricing\Domain\Pricings;
use Money\Money;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class PricingService
{
    /**
     * @var Pricings
     */
    private $pricings;

    /**
     * PricingService constructor.
     * @param Pricings $pricings
     */
    public function __construct(Pricings $pricings)
    {
        $this->pricings = $pricings;
    }

    public function registerLinearPricing(
        string $name,
        Money $cost,
        int $unitSize = 1
    ): UuidInterface {
        $pricing = new Pricing(
            Uuid::uuid4(),
            $name,
            new Linear($cost, $unitSize)
        );

        $this->pricings->save($pricing);

        return $pricing->getId();
    }

    public function calculateUsage(
        UuidInterface $pricingId,
        int $amount)
    {
        $pricing = $this->pricings->get($pricingId);

        return $pricing->calculate($amount);
    }
}





