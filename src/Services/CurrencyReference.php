<?php

declare(strict_types = 1);

namespace Cbr\Services;

use Cbr\Contracts\CurrencyReferenceInterface;
use Cbr\DTO\Valuta;
use Cbr\Exceptions\ParseDataException;
use Cbr\Exceptions\ServiceSendRequestException;
use GuzzleHttp\Psr7\Request;
use Tightenco\Collect\Support\Collection;

/**
 * Class CurrencyReference
 * @package Cbr\Services
 */
class CurrencyReference extends Service implements CurrencyReferenceInterface
{
    protected const API_ENDPOINT = 'http://www.cbr.ru/scripts/XML_valFull.asp';

    /**
     * @return Collection
     *
     * @throws ParseDataException
     * @throws ServiceSendRequestException
     */
    public function load(): Collection
    {
        $request = new Request('GET', self::API_ENDPOINT);
        $data = $this->sendRequest($request);
        $valutes = $this->parseValuta($data);

        return new Collection($valutes);
    }

    /**
     * @param array $data
     *
     * @return Valuta[]
     */
    protected function parseValuta(array $data): array
    {
        return array_map(function (array $item) {
            $parentCode = (string)$item['ParentCode'];
            $name = (string)$item['Name'];
            $engName = (string)$item['EngName'];
            $nominal = (int)$item['Nominal'];
            $isoNumCode = is_string($item['ISO_Num_Code']) ? (int)$item['ISO_Num_Code'] : null;
            $isoCharCode = is_string($item['ISO_Char_Code']) ? (string)$item['ISO_Char_Code'] : null;

            return new Valuta($parentCode, $name, $engName, $nominal, $isoNumCode, $isoCharCode);
        }, $data['Item']);
    }
}