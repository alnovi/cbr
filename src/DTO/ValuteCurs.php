<?php

declare(strict_types = 1);

namespace Cbr\DTO;

/**
 * Class ValuteCurs
 * @package Cbr\DTO
 */
class ValuteCurs
{
    /** @var string */
    protected string $id;

    /** @var int */
    protected int $nominal;

    /** @var float */
    protected float $value;

    /** @var \DateTime */
    protected \DateTime $date;

    /**
     * ValuteCurs constructor.
     * @param string $id
     * @param int $nominal
     * @param float $value
     * @param \DateTime $date
     */
    public function __construct(string $id, int $nominal, float $value, \DateTime $date)
    {
        $this->id = $id;
        $this->nominal = $nominal;
        $this->value = $value;
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getNominal(): int
    {
        return $this->nominal;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }
}
