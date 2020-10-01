<?php

declare(strict_types = 1);

namespace Cbr\Services;

use Cbr\Contracts\DailyInterface;
use Cbr\DTO\Valute;
use Cbr\Exceptions\ParseDataException;
use Cbr\Exceptions\ServiceSendRequestException;
use DateTimeInterface;
use GuzzleHttp\Psr7\Request;
use Tightenco\Collect\Support\Collection;

/**
 * Class Daily
 * @package Cbr\Services
 */
class Daily extends Service implements DailyInterface
{
    protected const API_ENDPOINT = 'http://www.cbr.ru/scripts/XML_daily.asp';

    /**
     * @param DateTimeInterface|null $date
     *
     * @return Collection
     *
     * @throws ServiceSendRequestException
     * @throws ParseDataException
     */
    public function load(?DateTimeInterface $date = null): Collection
    {
        $url = $date
            ? sprintf('%s?date_reg=%s', self::API_ENDPOINT, $date->format('d/m/Y'))
            : self::API_ENDPOINT;

        $request = new Request('GET', $url);
        $data = $this->sendRequest($request);
        $valutes = $this->parseValute($data);

        return new Collection($valutes);
    }

    /**
     * @param array $data
     *
     * @return Valute[]
     */
    protected function parseValute(array $data): array
    {
        return array_map(function (array $item) {
            return new Valute(
                (string)$item['@attributes']['ID'],
                (int)$item['NumCode'],
                (string)$item['CharCode'],
                (string)$item['Name'],
                floatval(str_replace(',', '.', $item['Value'])),
                (int)$item['Nominal'],
            );
        }, $data['Valute']);
    }
}
