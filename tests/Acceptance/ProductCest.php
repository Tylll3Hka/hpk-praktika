<?php
namespace Acceptance;
use Tests\Support\AcceptanceTester;

class ProductCest
{
    public function _before(AcceptanceTester $i) {}

    public function createProduct(AcceptanceTester $i)
    {
        $i->amOnPage("/");
        $i->fillField('input[name="title"]', 'test');
        $i->fillField('input[name="price"]', '123');
        $i->click("#create");
        $i->see("test");
        $i->wait("1");
    }
}
