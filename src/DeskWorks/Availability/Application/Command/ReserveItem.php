<?php

namespace DeskWorks\Availability\Application\Command;

use Ramsey\Uuid\UuidInterface;

class ReserveItem
{
    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var UuidInterface
     */
    private $ownerId;

    /**
     * @var \DatePeriod
     */
    private $period;

    public function __construct(
        UuidInterface $id,
        UuidInterface $ownerId,
        \DatePeriod $period
//        \DateTimeImmutable $from, // @todo Refactor, zastąpić to konceptem Period/DateRange
//        \DateTimeImmutable $to,
    )
    {
        $this->id = $id;
        $this->ownerId = $ownerId;
        $this->period = $period;
    }

    /**
     * @return UuidInterface
     */
    public function getId(): UuidInterface
    {
        return $this->id;
    }

    /**
     * @return UuidInterface
     */
    public function getOwnerId(): UuidInterface
    {
        return $this->ownerId;
    }

    /**
     * @return \DatePeriod
     */
    public function getPeriod(): \DatePeriod
    {
        return $this->period;
    }
}