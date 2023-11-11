<?php

declare(strict_types=1);

namespace Tests;

use Company\Company;
use Company\Item;
use PHPUnit\Framework\TestCase;

class CompanyTest extends TestCase
{
    public function testFoo(): void
    {
        $items = [new Item('foo', 0, 0)];
        $company = new Company($items);
        $company->updateQuality();
        $this->assertSame('fixme', $items[0]->name);
    }
}
