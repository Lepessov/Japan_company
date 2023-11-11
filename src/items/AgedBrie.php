<?php

class AgedBrie extends Item
{
    public function updateQuality()
    {
        $this->sellIn--;
        $this->quality = min(50, $this->quality + 1);

        if ($this->sellIn < 0) {
            // Quality increases twice as fast after sellIn has passed
            $this->quality = min(50, $this->quality + 1);
        }
    }
}