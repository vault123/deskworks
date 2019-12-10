<?php

namespace DeskWorks\Availability\Application\Command;

use Ramsey\Uuid\UuidInterface;

class RegisterItem
{
    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * RegisterItem constructor.
     * @param UuidInterface $id
     */
    public function __construct(UuidInterface $id)
    {
        $this->id = $id;
    }

    /**
     * @return UuidInterface
     */
    public function getId(): UuidInterface
    {
        return $this->id;
    }
}