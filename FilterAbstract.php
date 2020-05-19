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

    /**
     *
     * @param  GildedRose $item
     * @return void
     */
    public function apply(GildedRose $item): void
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
