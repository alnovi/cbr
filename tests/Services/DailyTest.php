<?php

declare(strict_types = 1);

namespace Cbr\Tests\Services;

use Cbr\CbrManager;
use Cbr\DTO\Valute;
use Cbr\Exceptions;
use Cbr\Tests\TestCase;
use Tightenco\Collect\Support\Collection;

class DailyTest extends TestCase
{
    /**
     * @test
     */
    public function success_mock_daily(): void
    {
        $cbrManager = new CbrManager(self::mockClient(200, self::XML_DAILY));
        $valutes = $cbrManager->daily()->load();
        $valute = $valutes->first();

        $this->assertInstanceOf(Collection::class, $valutes);
        $this->assertInstanceOf(Valute::class, $valute);

        $this->assertEquals('R01010', $valute->getId());
        $this->assertEquals(36, $valute->getNumCode());
        $this->assertEquals('AUD', $valute->getCharCode());
        $this->assertEquals('Австралийский доллар', $valute->getName());
        $this->assertEquals(54.9228, $valute->getValue());
    }

    /**
     * @test
     */
    public function error_request_mock_daily(): void
    {
        $cbrManager = new CbrManager(self::mockClient(500, self::XML_EMPTY));

        $this->expectException(Exceptions\ServiceSendRequestException::class);

        $cbrManager->daily()->load();
    }

    /**
     * @test
     */
    public function error_data_mock_daily(): void
    {
        $cbrManager = new CbrManager(self::mockClient(200, self::XML_ERROR));

        $this->expectException(Exceptions\ParseDataException::class);

        $cbrManager->daily()->load();
    }

    /**
     * @test
     */
    public function success_daily(): void
    {
        $cbrManager = new CbrManager();
        $valutes = $cbrManager->daily()->load();
        $valute = $valutes->first();

        $this->assertInstanceOf(Collection::class, $valutes);
        $this->assertInstanceOf(Valute::class, $valute);
    }

    /**
     * @test
     */
    public function success_current_date_daily(): void
    {
        $cbrManager = new CbrManager();
        $valutes = $cbrManager->daily()->load(new \DateTime());
        $valute = $valutes->first();

        $this->assertInstanceOf(Collection::class, $valutes);
        $this->assertInstanceOf(Valute::class, $valute);
    }
}