<?php

declare(strict_types = 1);

namespace Cbr;

use Cbr\Contracts\CurrencyReferenceInterface;
use Cbr\Contracts\DailyInterface;
use Cbr\Contracts\DynamicInterface;
use Cbr\Contracts\ManagerInterface;
use Cbr\Services\CurrencyReference;
use Cbr\Services\Daily;
use Cbr\Services\Dynamic;
use GuzzleHttp\Client;
use Psr\Http\Client\ClientInterface;

/**
 * Class CbrManager
 * @package Cbr
 */
class CbrManager implements ManagerInterface
{
    /**
     * @var Client|ClientInterface
     */
    protected ClientInterface $httpClient;

    /**
     * @param ClientInterface|null $client
     */
    public function __construct(ClientInterface $client = null)
    {
        $this->httpClient = $client ?? new Client();
    }

    /**
     * @return DailyInterface
     */
    public function daily(): DailyInterface
    {
        return new Daily($this->httpClient);
    }

    /**
     * @return CurrencyReferenceInterface
     */
    public function currencyReference(): CurrencyReferenceInterface
    {
        return new CurrencyReference($this->httpClient);
    }

    /**
     * @return DynamicInterface
     */
    public function dynamic(): DynamicInterface
    {
        return new Dynamic($this->httpClient);
    }
}
