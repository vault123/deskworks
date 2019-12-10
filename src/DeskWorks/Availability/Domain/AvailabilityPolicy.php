<?php


namespace DeskWorks\Availability\Domain;


interface AvailabilityPolicy
{
    public function isAvailable(array $reservations): bool;
}