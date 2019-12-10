<?php


namespace DeskWorks\Availability\Domain;


use Ramsey\Uuid\UuidInterface;

interface Items
{
    public function save(Item $item): void;

    public function get(UuidInterface $id): Item;
}