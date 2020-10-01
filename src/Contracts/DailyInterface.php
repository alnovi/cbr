<?php

declare(strict_types = 1);

namespace Cbr\Contracts;

use DateTimeInterface;
use Tightenco\Collect\Support\Collection;

/**
 * Interface DailyInterface
 * @package Cbr\Contracts
 */
interface DailyInterface extends ServiceInterface
{
    /**
     * @param DateTimeInterface|null $date
     * @return Collection
     */
    public function load(?DateTimeInterface $date = null): Collection;
}
