<?php

declare(strict_types = 1);

namespace Cbr\Contracts;

use DateTimeInterface;
use Tightenco\Collect\Support\Collection;

interface DynamicInterface extends ServiceInterface
{
    public function load(DateTimeInterface $from, DateTimeInterface $to, string $valuteId): Collection;
}