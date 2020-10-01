<?php

namespace Cbr\Tests\Services;

use Cbr\CbrManager;
use Cbr\DTO\ValuteCurs;
use Cbr\Tests\TestCase;
use Tightenco\Collect\Support\Collection;

class DynamicTest extends TestCase
{
    private \DateTimeInterface $from;
    private \DateTimeInterface $to;
    private string $valuteId;

    /**
     * DynamicTest constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->from = new \DateTime('02.03.2001');
        $this->to = new \DateTime('14.03.2001');
        $this->valuteId = 'R01235';
    }

    /**
     * @test
     */
    public function success_mock_dynamic(): void
    {
        $cbrManager = new CbrManager(self::mockClient(200, self::XML_DYNAMIC));
        $valutes = $cbrManager->dynamic()->load($this->from, $this->to, $this->valuteId);
        $valuteCurs = $valutes->first();

        $this->assertInstanceOf(Collection::class, $valutes);
        $this->assertInstanceOf(ValuteCurs::class, $valuteCurs);

        $this->assertEquals($this->valuteId, $valuteCurs->getId());
        $this->assertEquals(1, $valuteCurs->getNominal());
        $this->assertEquals(28.6200, $valuteCurs->getValue());
        $this->assertEquals('02.03.2001', $valuteCurs->getDate()->format('d.m.Y'));
    }

    /**
     * @test
     */
    public function success_dynamic(): void
    {
        $cbrManager = new CbrManager();
        $valutes = $cbrManager->dynamic()->load($this->from, $this->to, $this->valuteId);
        $valuteCurs = $valutes->first();

        $this->assertInstanceOf(Collection::class, $valutes);
        $this->assertInstanceOf(ValuteCurs::class, $valuteCurs);
    }
}