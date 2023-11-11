<?php

class NormalItem extends Item
{
    public function updateQuality()
    {
        $this->sellIn--;
        // Normal items degrade in quality
        $this->quality = max(0, $this->quality - 1);

        if ($this->sellIn < 0) {
            // Quality degrades twice as fast after sellIn has passed
            $this->quality = max(0, $this->quality - 1);
        }
    }
}