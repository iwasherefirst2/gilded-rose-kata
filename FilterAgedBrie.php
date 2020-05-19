<?php

namespace App;

class FilterAgedBrie extends FilterAbstract
{
    public function __construct()
    {
        $this->quality = false;
        $this->sellin  = true;
    }

    public function match(string $name): bool
    {
        return $name == 'Aged Brie';
    }

    public function applyFilter(GildedRose $item): void
    {
        if ($item->quality >= 50) {
            return;
        }

        $item->quality++;

        if ($item->sellIn <= 0 && $item->quality <50) {
            $item->quality++;
        }
    }
}
