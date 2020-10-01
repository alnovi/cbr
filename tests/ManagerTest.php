<?php
declare(strict_types = 1);

namespace Cbr\Tests;

use Cbr\CbrManager;
use Cbr\Contracts;
use Cbr\Services;

class ManagerTest extends TestCase
{
    /**
     * @test
     * @dataProvider additionProvider
     * @param CbrManager $cbrManager
     */
    public function create_new_instance(CbrManager $cbrManager): void
    {
        $this->assertInstanceOf(CbrManager::class, $cbrManager);
        $this->assertInstanceOf(Contracts\ManagerInterface::class, $cbrManager);
    }

    /**
     * @test
     * @dataProvider additionProvider
     * @param CbrManager $cbrManager
     */
    public function get_daily_service(CbrManager $cbrManager): void
    {
        $this->assertInstanceOf(Services\Daily::class, $cbrManager->daily());
        $this->assertInstanceOf(Contracts\DailyInterface::class, $cbrManager->daily());
    }

    /**
     * @return CbrManager[]
     */
    public function additionProvider(): array
    {
        return [
            [new CbrManager()],
            [new CbrManager(self::mockClient(200, self::XML_EMPTY))],
        ];
    }
}