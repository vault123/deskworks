<?php

use DeskWorks\Pricing\Application\PricingService;
use DeskWorks\Pricing\Infrastructure\InMemoryPricings;
use Money\Money;

require_once __DIR__ . '/vendor/autoload.php';

$pricings = new InMemoryPricings();
$pricingService = new PricingService($pricings);

$pricingId = $pricingService->registerLinearPricing('CENNIK', Money::PLN(10));

dump($pricingService->calculateUsage($pricingId, 500));
dump($pricings);
