<?php

class BackstagePasses extends Item
{
    public function updateQuality()
    {
        $this->sellIn--;

        if ($this->sellIn < 0) {
            // Quality drops to 0 after the concert
            $this->quality = 0;
        } elseif ($this->sellIn <= 5) {
            $this->quality = min(50, $this->quality + 3);
        } elseif ($this->sellIn <= 10) {
            $this->quality = min(50, $this->quality + 2);
        } else {
            $this->quality = min(50, $this->quality + 1);
        }
    }
}