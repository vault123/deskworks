<?php

namespace DeskWorks\Availability\Domain;

use DeskWorks\Availability\Domain\AvailabilityPolicy\AlwaysSayYes;
use Ramsey\Uuid\UuidInterface;

class AvailabilityPolicyFactory
{
    public function createFor(UuidInterface $ownerId): AvailabilityPolicy
    {
        return new AlwaysSayYes();
    }
}