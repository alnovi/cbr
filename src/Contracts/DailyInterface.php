<?php

declare(strict_types = 1);

namespace Cbr\Contracts;

use DateTimeInterface;
use Tightenco\Collect\Support\Collection;

interface DailyInterface extends ServiceInterface
{
    public function load(?DateTimeInterface $date = null): Collection;
}