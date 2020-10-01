<?php

declare(strict_types = 1);

namespace Cbr\Tests\DTO;

use Cbr\DTO\Valuta;
use Cbr\Tests\TestCase;

class ValutaTest extends TestCase
{
    public function test_dto_valuta()
    {
        $id = 'R01010';
        $name = 'Австралийский доллар';
        $engName = 'Australian Dollar';
        $nominal = 1;
        $isoNumCode = null;
        $isoCharCode = null;

        $valuta = new Valuta($id, $name, $engName, $nominal, $isoNumCode, $isoCharCode);

        $this->assertIsString($valuta->getId());
        $this->assertIsString($valuta->getName());
        $this->assertIsString($valuta->getEngName());
        $this->assertIsInt($valuta->getNominal());
        $this->assertNull($valuta->getIsoNumCode());
        $this->assertNull($valuta->getIsoCharCode());

        $this->assertEquals($id, $valuta->getId());
        $this->assertEquals($name, $valuta->getName());
        $this->assertEquals($engName, $valuta->getEngName());
        $this->assertEquals($nominal, $valuta->getNominal());
        $this->assertEquals($isoNumCode, $valuta->getIsoNumCode());
        $this->assertEquals($isoCharCode, $valuta->getIsoCharCode());
    }

    /**
     * @test
     */
    public function test_full_dto_valuta(): void
    {
        $id = 'R01010';
        $name = 'Австралийский доллар';
        $engName = 'Australian Dollar';
        $nominal = 1;
        $isoNumCode = 36;
        $isoCharCode = 'AUD';

        $valuta = new Valuta($id, $name, $engName, $nominal, $isoNumCode, $isoCharCode);

        $this->assertIsString($valuta->getId());
        $this->assertIsString($valuta->getName());
        $this->assertIsString($valuta->getEngName());
        $this->assertIsInt($valuta->getNominal());
        $this->assertIsInt($valuta->getIsoNumCode());
        $this->assertIsString($valuta->getIsoCharCode());

        $this->assertEquals($id, $valuta->getId());
        $this->assertEquals($name, $valuta->getName());
        $this->assertEquals($engName, $valuta->getEngName());
        $this->assertEquals($nominal, $valuta->getNominal());
        $this->assertEquals($isoNumCode, $valuta->getIsoNumCode());
        $this->assertEquals($isoCharCode, $valuta->getIsoCharCode());
    }
}
