<?php

namespace DeskWorks\Availability\Domain;

use Ramsey\Uuid\UuidInterface;

class Item
{
    /**
     * @var UuidInterface
     */
    private $id;

    private $reservations = [];

    /**
     * Item constructor.
     * @param UuidInterface $id
     */
    public function __construct(UuidInterface $id)
    {
        $this->id = $id;
    }

    public function reserve(
        UuidInterface $ownerId,
        \DatePeriod $period,
        AvailabilityPolicy $policy
    ): void
    {
        if (!$policy->isAvailable($this->reservations)) {
            throw new \RuntimeException("ŁUPS...");
        }

        $this->reservations[] = new Reservation($ownerId, $period);

        // $eventPublisher->publish(new ReservationWasMade(/* ... */));
        // $this->events[] = new ReservationWasMade(/* ... */));
    }

    /**
     * @return UuidInterface
     */
    public function getId(): UuidInterface
    {
        return $this->id;
    }
}