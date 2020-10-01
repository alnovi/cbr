<?php

declare(strict_types = 1);

namespace Cbr\Contracts;

use Tightenco\Collect\Support\Collection;

/**
 * Interface CurrencyReferenceInterface
 * @package Cbr\Contracts
 */
interface CurrencyReferenceInterface extends ServiceInterface
{
    /**
     * @return Collection
     */
    public function load(): Collection;
}
