<?php


namespace DeskWorks\Availability\Domain\AvailabilityPolicy;


use DeskWorks\Availability\Domain\AvailabilityPolicy;

class AndX implements AvailabilityPolicy
{
    /**
     * @var AvailabilityPolicy[]
     */
    private $policies;

    /**
     * AndX constructor.
     * @param AvailabilityPolicy[] $policies
     */
    public function __construct(array $policies)
    {
        $this->policies = $policies;
    }

    public function isAvailable(array $reservations): bool
    {
        foreach ($this->policies as $policy) {
            if (!$policy->isAvailable($reservations)) {
                return false;
            }
        }

        return true;
    }

}