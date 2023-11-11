<?php

declare(strict_types=1);

namespace Tests;

use Company\Company;
use Company\Item;
use PHPUnit\Framework\TestCase;

class CompanyTest extends TestCase
{
    public function testUpdateQualityForAgedBrie()
    {
        $agedBrie = new Item('Aged Brie', 5, 20);
        $company = new Company([$agedBrie]);

        $company->updateQuality();

        $this->assertEquals(21, $agedBrie->quality);
    }

    public function testUpdateQualityForAgedBrieExpired()
    {
        $agedBrie = new Item('Aged Brie', 0, 20);
        $company = new Company([$agedBrie]);

        $company->updateQuality();

        $this->assertEquals(22, $agedBrie->quality);
    }

    public function testUpdateQualityForBackstagePassesNormal()
    {
        $backstagePass = new Item('Backstage passes', 20, 30);
        $company = new Company([$backstagePass]);

        $company->updateQuality();

        $this->assertEquals(31, $backstagePass->quality);
    }

    public function testUpdateQualityForBackstagePassesCloseToConcert()
    {
        $backstagePass = new Item('Backstage passes', 10, 30);
        $company = new Company([$backstagePass]);

        $company->updateQuality();

        $this->assertEquals(32, $backstagePass->quality);
    }

    public function testUpdateQualityForBackstagePassesVeryCloseToConcert()
    {
        $backstagePass = new Item('Backstage passes', 5, 30);
        $company = new Company([$backstagePass]);

        $company->updateQuality();

        $this->assertEquals(33, $backstagePass->quality);
    }

    public function testUpdateQualityForBackstagePassesAfterConcert()
    {
        $backstagePass = new Item('Backstage passes', 0, 30);
        $company = new Company([$backstagePass]);

        $company->updateQuality();

        $this->assertEquals(0, $backstagePass->quality);
    }

    public function testUpdateQualityForSulfuras()
    {
        $sulfuras = new Item('Sulfuras', 100, 80);
        $company = new Company([$sulfuras]);

        $company->updateQuality();

        $this->assertEquals(80, $sulfuras->quality);
        $this->assertEquals(100, $sulfuras->sellIn);
    }

    public function testUpdateQualityForConjured()
    {
        $conjured = new Item('Conjured', 3, 15);
        $company = new Company([$conjured]);

        $company->updateQuality();

        $this->assertEquals(13, $conjured->quality);
    }

    public function testUpdateQualityForNormalItem()
    {
        $normalItem = new Item('Normal Item', 8, 25);
        $company = new Company([$normalItem]);

        $company->updateQuality();

        $this->assertEquals(24, $normalItem->quality);
    }

    public function testUpdateQualityForNormalItemExpired()
    {
        $normalItem = new Item('Normal Item', 0, 25);
        $company = new Company([$normalItem]);

        $company->updateQuality();

        $this->assertEquals(23, $normalItem->quality);
    }
}