<?php

declare(strict_types = 1);

namespace Cbr\Tests\DTO;

use Cbr\DTO\Valute;
use Cbr\Tests\TestCase;

class ValuteTest extends TestCase
{
    /**
     * @test
     */
    public function test_dto_valute(): void
    {
        $id = 'R00001';
        $numCode = 001;
        $charCode = 'RUS';
        $name = 'Русский рубль';
        $value = 10.00;
        $nominal = 10;

        $valute = new Valute($id, $numCode, $charCode, $name, $value, $nominal);

        $this->assertIsString($valute->getId());
        $this->assertIsInt($valute->getNumCode());
        $this->assertIsString($valute->getCharCode());
        $this->assertIsString($valute->getName());
        $this->assertIsFloat($valute->getValue());

        $this->assertEquals($id, $valute->getId());
        $this->assertEquals($numCode, $valute->getNumCode());
        $this->assertEquals($charCode, $valute->getCharCode());
        $this->assertEquals($name, $valute->getName());
        $this->assertEquals($value/$nominal, $valute->getValue());
    }
}