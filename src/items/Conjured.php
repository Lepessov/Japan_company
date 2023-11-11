<?php

class Conjured extends Item
{
    public function updateQuality()
    {
        $this->sellIn--;
        // Conjured items degrade in quality twice as fast as normal items
        $this->quality -= 2;
        // Make sure quality is never negative
        $this->quality = max(0, $this->quality);

        if ($this->sellIn < 0) {
            // Quality degrades twice as fast after sellIn has passed
            $this->quality -= 2;
            $this->quality = max(0, $this->quality);
        }
    }
}