<?php

namespace DeskWorks\Availability\Infrastructure;

use DeskWorks\Availability\Domain\Item;
use DeskWorks\Availability\Domain\Items;
use Ramsey\Uuid\UuidInterface;

class InMemoryItems implements Items
{
    /**
     * @var Item[]
     */
    private $items = [];

    public function save(Item $item): void
    {
        $this->items[$item->getId()->toString()] = $item;
    }

    public function get(UuidInterface $id): Item
    {
        // @todo

        return $this->items[$id->toString()];
    }
}