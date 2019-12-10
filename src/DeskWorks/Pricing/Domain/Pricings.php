<?php

namespace DeskWorks\Pricing\Domain;

use Ramsey\Uuid\UuidInterface;

interface Pricings
{
    public function save(Pricing $pricing): void;

    public function get(UuidInterface $id): Pricing;
}