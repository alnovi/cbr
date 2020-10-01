<?php

declare(strict_types = 1);

namespace Cbr\Contracts;

use Psr\Http\Client\ClientInterface;

/**
 * Interface ServiceInterface
 * @package Cbr\Contracts
 */
interface ServiceInterface
{
    /**
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client);
}
