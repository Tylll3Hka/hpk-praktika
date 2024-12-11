<?php
namespace Acceptance;

use Src\ProductsRepository;
use Tests\Support\AcceptanceTester;

class EntranceCest
{
    protected mixed $lastProductId;

    public function _before(AcceptanceTester $i) {}

    public function __construct()
    {
        require_once "vendor/autoload.php";
        $product = new ProductsRepository();
        $this->lastProductId = $product->getLastProduct();
    }

    public function createEntrance(AcceptanceTester $i)
    {
        $i->amOnPage("/entrance.php");
        $i->selectOption("#selectProduct", (string)$this->lastProductId['id']);
        $i->fillField('input[name="count"]', '20');
        $i->click("#create");
        $i->see("20");
        $i->see((string)$this->lastProductId['id']);
        $i->wait("1");
    }
}
