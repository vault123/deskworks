<?php

use DeskWorks\Availability\Application\Command\RegisterItem;
use DeskWorks\Availability\Application\Command\ReserveItem;
use DeskWorks\Availability\Application\Handler\RegisterItemHandler;
use DeskWorks\Availability\Application\Handler\ReserveItemHandler;
use DeskWorks\Availability\Domain\AvailabilityPolicyFactory;
use DeskWorks\Availability\Infrastructure\InMemoryItems;
use DeskWorks\Pricing\Application\PricingService;
use DeskWorks\Pricing\Infrastructure\InMemoryPricings;
use Money\Money;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Messenger\Handler\HandlersLocator;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\Middleware\HandleMessageMiddleware;
use Symfony\Component\Messenger\Stamp\HandledStamp;

require_once __DIR__ . '/vendor/autoload.php';

$pricings = new InMemoryPricings();
$pricingService = new PricingService($pricings);
$items = new InMemoryItems();

$bus = new MessageBus([
    new HandleMessageMiddleware(new HandlersLocator([
        RegisterItem::class => [new RegisterItemHandler($items)],
        ReserveItem::class => [new ReserveItemHandler($items, new AvailabilityPolicyFactory())]
    ])),
]);

$pricingId = $pricingService->registerLinearPricing('CENNIK', Money::PLN(10));

$itemId = Uuid::uuid4();

$bus->dispatch(new RegisterItem($itemId));
$bus->dispatch(new ReserveItem(
    $itemId,
    Uuid::uuid4(),
    new \DatePeriod(new DateTimeImmutable("2019-01-01"), new DateInterval('P1D'), new DateTimeImmutable("2019-01-02"))
));

//dump($pricingService->calculateUsage($pricingId, 500));
//dump($pricings);
dump($items);
