<?php

namespace DeskWorks\Pricing\Domain;

use Money\Money;
use Ramsey\Uuid\UuidInterface;
use Webmozart\Assert\Assert;

class Pricing
{
    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \DateTimeImmutable
     */
    private $created;

    /**
     * @var CalculationMethod
     */
    private $calculationMethod;

    /**
     * Pricing constructor.
     * @param UuidInterface $id
     * @param string $name
     * @param CalculationMethod $calculationMethod
     * @throws \Exception
     */
    public function __construct(UuidInterface $id, string $name, CalculationMethod $calculationMethod)
    {
        Assert::notEmpty($name);

        $this->id = $id;
        $this->name = $name;
        $this->calculationMethod = $calculationMethod;
        $this->created = new \DateTimeImmutable(); // @todo Wstrzyknąć Clock?
    }

    public function calculate(int $amount): Money
    {
        return $this->calculationMethod->calculate($amount);
    }

    /**
     * @return UuidInterface
     */
    public function getId(): UuidInterface
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getCreated(): \DateTimeImmutable
    {
        return $this->created;
    }
}