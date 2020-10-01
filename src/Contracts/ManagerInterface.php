<?php

declare(strict_types = 1);

namespace Cbr\Contracts;

use Psr\Http\Client\ClientInterface;

/**
 * Interface CbrManagerInterface
 * @package Cbr\Contracts
 */
interface ManagerInterface
{
    /**
     * @param ClientInterface|null $client
     */
    public function __construct(ClientInterface $client = null);

    /**
     * @return DailyInterface
     */
    public function daily(): DailyInterface;

    /**
     * @return CurrencyReferenceInterface
     */
    public function currencyReference(): CurrencyReferenceInterface;

    /**
     * @return DynamicInterface
     */
    public function dynamic(): DynamicInterface;
}
