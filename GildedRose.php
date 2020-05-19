<?php

namespace App;

class GildedRose
{
    public $name;

    public $quality;

    public $sellIn;

    protected $filters;

    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;

        // This should added by dependency injection ..
        $this->filters[] = new FilterAgedBrie();
        $this->filters[] = new FilterSulfuras();
        $this->filters[] = new FilterBackstage();
        $this->filters[] = new FilterConjured();
    }

    /**
     *
     * @param  string $name
     * @param  int $quality
     * @param  int $sellIn
     * @return GildedRose
     */
    public static function of($name, $quality, $sellIn)
    {
        return new static($name, $quality, $sellIn);
    }

    public function tick(): void
    {
        foreach ($this->filters as $filter) {
            if ($filter->match($this->name)) {
                return $filter->apply($this);
            }
        }

        $this->decreaseQuality();
        $this->decreaseSellIn();
    }

    public function decreaseQuality(): void
    {
        if ($this->quality <= 0) {
            return;
        }
        $this->quality--;

        if ($this->quality <= 0) {
            return;
        }

        if ($this->sellIn <= 0) {
            $this->quality--;
        }
    }

    public function decreaseSellIn(): void
    {
        $this->sellIn--;
    }
}
