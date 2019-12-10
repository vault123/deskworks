<?php

namespace DeskWorks\Availability\Domain\AvailabilityPolicy;

use DeskWorks\Availability\Domain\AvailabilityPolicy;

class SequentialReservation implements AvailabilityPolicy
{
    public function isAvailable(array $reservations): bool
    {
        return true;
    }
}