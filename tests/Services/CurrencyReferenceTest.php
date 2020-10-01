<?php

namespace Cbr\Tests\Services;

use Cbr\CbrManager;
use Cbr\DTO\Valuta;
use Cbr\Tests\TestCase;
use Tightenco\Collect\Support\Collection;

class CurrencyReferenceTest extends TestCase
{
    /**
     * @test
     */
    public function success_mock_currency(): void
    {
        $cbrManager = new CbrManager(self::mockClient(200, self::XML_CURRENCY));
        $valutes = $cbrManager->currencyReference()->load();
        $valuta = $valutes->first();

        $this->assertInstanceOf(Collection::class, $valutes);
        $this->assertInstanceOf(Valuta::class, $valuta);

        $this->assertEquals('R01010', $valuta->getId());
        $this->assertEquals('Австралийский доллар', $valuta->getName());
        $this->assertEquals('Australian Dollar', $valuta->getEngName());
        $this->assertEquals(1, $valuta->getNominal());
        $this->assertEquals(36, $valuta->getIsoNumCode());
        $this->assertEquals('AUD', $valuta->getIsoCharCode());
    }

    public function success_currency(): void
    {
        $cbrManager = new CbrManager();
        $valutes = $cbrManager->currencyReference()->load();
        $valuta = $valutes->first();

        $this->assertInstanceOf(Collection::class, $valutes);
        $this->assertInstanceOf(Valuta::class, $valuta);
    }
}
