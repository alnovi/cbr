<?php

declare(strict_types = 1);

namespace Cbr\Tests\DTO;

use Cbr\DTO\ValuteCurs;
use Cbr\Tests\TestCase;

class ValuteCursTest extends TestCase
{
    /**
     * @test
     */
    public function test_dto_valute_curs(): void
    {
        $id = 'R01235';
        $nominal = 1;
        $value = 28.6200;
        $date = new \DateTime('02.03.2001');

        $valuteCurs = new ValuteCurs($id, $nominal, $value, $date);

        $this->assertIsString($valuteCurs->getId());
        $this->assertIsInt($valuteCurs->getNominal());
        $this->assertIsFloat($valuteCurs->getValue());
        $this->assertInstanceOf(get_class($date), $valuteCurs->getDate());

        $this->assertEquals($id, $valuteCurs->getId());
        $this->assertEquals($nominal, $valuteCurs->getNominal());
        $this->assertEquals($value, $valuteCurs->getValue());
        $this->assertEquals('02.03.2001', $valuteCurs->getDate()->format('d.m.Y'));
    }
}
