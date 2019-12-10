<?php

namespace DeskWorks\Availability\Application\Handler;

use DeskWorks\Availability\Application\Command\RegisterItem;
use DeskWorks\Availability\Application\Command\ReserveItem;
use DeskWorks\Availability\Domain\AvailabilityPolicy\AlwaysSayYes;
use DeskWorks\Availability\Domain\AvailabilityPolicyFactory;
use DeskWorks\Availability\Domain\Item;
use DeskWorks\Availability\Domain\Items;

class ReserveItemHandler
{
    /**
     * @var Items
     */
    private $items;

    /**
     * @var AvailabilityPolicyFactory
     */
    private $factory;

    /**
     * ReserveItemHandler constructor.
     * @param Items $items
     * @param AvailabilityPolicyFactory $factory
     */
    public function __construct(Items $items, AvailabilityPolicyFactory $factory)
    {
        $this->items = $items;
        $this->factory = $factory;
    }

    public function __invoke(ReserveItem $command)
    {
        $item = $this->items->get($command->getId());

        $item->reserve(
            $command->getOwnerId(),
            $command->getPeriod(),
            $this->factory->createFor($command->getOwnerId())
        );

        $this->items->save($item);
    }
}