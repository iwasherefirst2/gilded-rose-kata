<?php

namespace App;

class FilterSulfuras extends FilterAbstract
{
    public function __construct()
    {
        $this->quality = false;
        $this->sellin  = false;
    }

    public function match(string $name): bool
    {
        return $name == 'Sulfuras, Hand of Ragnaros';
    }

    public function applyFilter(GildedRose $item): void
    {
    }
}
