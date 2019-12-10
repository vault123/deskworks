<?php

namespace DeskWorks\Pricing\Infrastructure;

use DeskWorks\Pricing\Domain\Pricing;
use DeskWorks\Pricing\Domain\Pricings;
use Ramsey\Uuid\UuidInterface;

class InMemoryPricings implements Pricings
{
    /**
     * @var Pricing[]
     */
    private $pricings = [];

    public function save(Pricing $pricing): void
    {
        $this->pricings[$pricing->getId()->toString()] = $pricing;
    }

    public function get(UuidInterface $id): Pricing
    {
        return $this->pricings[$id->toString()];
    }

}