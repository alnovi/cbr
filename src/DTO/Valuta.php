<?php

declare(strict_types = 1);

namespace Cbr\DTO;

/**
 * Class Valuta
 * @package Cbr\DTO
 */
class Valuta
{
    /** @var string */
    protected string $id;

    /** @var string */
    protected string $name;

    /** @var string */
    protected string $engName;

    /** @var int */
    protected int $nominal;

    /** @var int */
    protected ?int $isoNumCode;

    /** @var string */
    protected ?string $isoCharCode;

    /**
     * Valuta constructor.
     * @param string $id
     * @param string $name
     * @param string $engName
     * @param int $nominal
     * @param int|null $isoNumCode
     * @param string|null $isoCharCode
     */
    public function __construct(string $id, string $name, string $engName, int $nominal, ?int $isoNumCode = null, ?string $isoCharCode = null)
    {
        $this->id = trim($id);
        $this->name = trim($name);
        $this->engName = trim($engName);
        $this->nominal = $nominal;
        $this->isoNumCode = $isoNumCode;
        $this->isoCharCode = $isoCharCode !== null ? trim($isoCharCode) : null;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEngName(): string
    {
        return $this->engName;
    }

    /**
     * @return int
     */
    public function getNominal(): int
    {
        return $this->nominal;
    }

    /**
     * @return int|null
     */
    public function getIsoNumCode(): ?int
    {
        return $this->isoNumCode;
    }

    /**
     * @return string|null
     */
    public function getIsoCharCode(): ?string
    {
        return $this->isoCharCode;
    }
}