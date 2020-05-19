<?php

namespace App;

abstract class FilterAbstract
{
    protected $quality;

    protected $sellin;

    abstract public function match(string $name): bool;

    abstract public function applyFilter(GildedRose $item): void;

    public function applyQuality(): bool
    {
        return $this->quality;
    }

    public function applySellIn(): bool
    {
        return $this->sellin;
    }

    public function apply(GildedRose $item)
    {
        if ($this->applyQuality()) {
            $item->decreaseQuality();
        }

        if ($this->applySellIn()) {
            $item->decreaseSellIn();
        }

        $this->applyFilter($item);
    }
}
