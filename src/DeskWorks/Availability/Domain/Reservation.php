<?php


namespace DeskWorks\Availability\Domain;

use Ramsey\Uuid\UuidInterface;

class Reservation
{
    /**
     * @var UuidInterface
     */
    private $ownerId;

    /**
     * @var \DatePeriod
     */
    private $period;

    /**
     * Reservation constructor.
     * @param UuidInterface $ownerId
     * @param \DatePeriod $period
     */
    public function __construct(UuidInterface $ownerId, \DatePeriod $period)
    {
        $this->ownerId = $ownerId;
        $this->period = $period;
    }
}