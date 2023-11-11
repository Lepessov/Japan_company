<?php

declare(strict_types=1);

namespace Company;

use App\Factory\ItemFactory;

final class Company
{
    /**
     * @param Item[] $items
     */
    public function __construct(
        private array $items
    ) {
    }

    public function updateQuality()
    {
        foreach ($this->items as $item) {
            $itemName = $item->name;

            if (strpos($itemName, 'Sulfuras') !== false) {
                continue;
            } elseif (strpos($itemName, 'Backstage passes') !== false) {
                $this->updateBackstagePasses($item);
            } elseif ($itemName == 'Aged Brie') {
                $this->updateAgedBrie($item);
            } elseif ($itemName == 'Conjured') {
                $this->updateConjured($item);
            } else {
                $this->updateNormalItem($item);
            }
            
        }
    }

    private function updateAgedBrie($item)
    {
        $item->sellIn--;
        $item->quality = min(50, $item->quality + 1);

        if ($item->sellIn < 0) {

            $item->quality = min(50, $item->quality + 1);
        }
    }

    private function updateBackstagePasses($item)
    {
        $item->sellIn--;

        if ($item->sellIn < 0) {

            $item->quality = 0;
        } elseif ($item->sellIn <= 5) {
            $item->quality = min(50, $item->quality + 3);
        } elseif ($item->sellIn <= 10) {
            $item->quality = min(50, $item->quality + 2);
        } else {
            $item->quality = min(50, $item->quality + 1);
        }
    }

    private function updateConjured($item)
    {
        $item->sellIn--;

        $item->quality -= 2;

        $item->quality = max(0, $item->quality);

        if ($item->sellIn < 0) {
            $item->quality -= 2;
            $item->quality = max(0, $item->quality);
        }
    }

    private function updateNormalItem($item)
    {
        $item->sellIn--;

        $item->quality = max(0, $item->quality - 1);

        if ($item->sellIn < 0) {

            $item->quality = max(0, $item->quality - 1);
        }
    }
}
