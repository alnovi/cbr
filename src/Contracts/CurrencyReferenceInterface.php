<?php

declare(strict_types = 1);

namespace Cbr\Contracts;

use Tightenco\Collect\Support\Collection;

interface CurrencyReferenceInterface extends ServiceInterface
{
    public function load(): Collection;
}