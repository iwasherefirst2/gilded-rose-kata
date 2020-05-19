<?php

namespace App;

class FilterBackstage extends FilterAbstract
{
    public function __construct()
    {
        $this->quality = false;
        $this->sellin  = true;
    }

    public function match(string $name): bool
    {
        return $name == 'Backstage passes to a TAFKAL80ETC concert';
    }

    public function applyFilter(GildedRose $item): void
    {
        if ($item->sellIn < 0) {
            $item->quality = 0;
            return;
        }

        if ($item->quality == 50) {
            return;
        }
        $item->quality = $item->quality + 1;

        if ($item->sellIn < 10) {
            $item->quality = $item->quality + 1;
        }
        if ($item->sellIn < 5) {
            $item->quality = $item->quality + 1;
        }
    }
}
