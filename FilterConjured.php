<?php

namespace App;

class FilterConjured extends FilterAbstract
{
    public function __construct()
    {
        $this->quality = true;
        $this->sellin  = true;
    }

    public function match(string $name): bool
    {
        return preg_match('/^Conjured/', $name);
    }

    public function applyFilter(GildedRose $item): void
    {
        $item->decreaseQuality();
    }
}
