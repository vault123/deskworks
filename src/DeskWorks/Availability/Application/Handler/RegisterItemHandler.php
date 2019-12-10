<?php

namespace DeskWorks\Availability\Application\Handler;

use DeskWorks\Availability\Application\Command\RegisterItem;
use DeskWorks\Availability\Domain\Item;
use DeskWorks\Availability\Domain\Items;

class RegisterItemHandler
{
    /**
     * @var Items
     */
    private $items;

    /**
     * RegisterItemHandler constructor.
     * @param Items $items
     */
    public function __construct(Items $items)
    {
        $this->items = $items;
    }

    public function __invoke(RegisterItem $command)
    {
        $item = new Item($command->getId());

        $this->items->save($item);
    }
}