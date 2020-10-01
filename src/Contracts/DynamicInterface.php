<?php

declare(strict_types = 1);

namespace Cbr\Contracts;

use DateTimeInterface;
use Tightenco\Collect\Support\Collection;

/**
 * Interface DynamicInterface
 * @package Cbr\Contracts
 */
interface DynamicInterface extends ServiceInterface
{
    /**
     * @param DateTimeInterface $from
     * @param DateTimeInterface $to
     * @param string $valutaId
     *
     * @return Collection
     */
    public function load(DateTimeInterface $from, DateTimeInterface $to, string $valutaId): Collection;
}
