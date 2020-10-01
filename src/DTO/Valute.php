<?php

declare(strict_types = 1);

namespace Cbr\DTO;

/**
 * Class Valute
 * @package Cbr\DTO
 */
class Valute
{
    /** @var string  */
    protected string $id;

    /** @var int  */
    protected int $numCode;

    /** @var string  */
    protected string $charCode;

    /** @var string  */
    protected string $name;

    /** @var float  */
    protected float $value;

    /**
     * Valute constructor.
     * @param string $id
     * @param int $numCode
     * @param string $charCode
     * @param string $name
     * @param float $value
     * @param int $nominal
     */
    public function __construct(string $id, int $numCode, string $charCode, string $name, float $value, int $nominal = 1)
    {
        $this->id = trim($id);
        $this->numCode = $numCode;
        $this->charCode = trim($charCode);
        $this->name = trim($name);
        $this->value = $value / $nominal;
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
    public function getNumCode(): int
    {
        return $this->numCode;
    }

    /**
     * @return string
     */
    public function getCharCode(): string
    {
        return $this->charCode;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }
}