<?php

class ItemFactory
{
    public static function createItem($item)
    {
        switch ($item->name) {
            case 'Aged Brie':
                return new AgedBrie($item);
            case 'Backstage passes':
                return new BackstagePasses($item);
            case 'Conjured':
                return new Conjured($item);
            case 'Sulfuras':
                return new Sulfuras($item);
            default:
                return new NormalItem($item);
        }
    }
}