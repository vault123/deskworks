<?php


namespace DeskWorks\Availability\Domain\AvailabilityPolicy;


use DeskWorks\Availability\Domain\AvailabilityPolicy;

class AlwaysSayYes implements AvailabilityPolicy
{
    public function isAvailable(array $reservations): bool
    {
        return true;
    }
}