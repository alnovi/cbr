<?php

declare(strict_types = 1);

namespace Cbr\Services;

use Cbr\Contracts\DynamicInterface;
use Cbr\DTO\ValuteCurs;
use Cbr\Exceptions\ParseDataException;
use Cbr\Exceptions\ServiceSendRequestException;
use DateTimeInterface;
use GuzzleHttp\Psr7\Request;
use Tightenco\Collect\Support\Collection;

/**
 * Class Dynamic
 * @package Cbr\Services
 */
class Dynamic extends Service implements DynamicInterface
{
    protected const API_ENDPOINT = 'http://www.cbr.ru/scripts/XML_dynamic.asp';
    /**
     * @param DateTimeInterface $from
     * @param DateTimeInterface $to
     * @param string $valutaId
     *
     * @return Collection
     *
     * @throws ServiceSendRequestException
     * @throws ParseDataException
     */
    public function load(DateTimeInterface $from, DateTimeInterface $to, string $valutaId): Collection
    {
        $url = sprintf(
            '%s?date_req1=%s&date_req2=%s&VAL_NM_RQ=%s',
            self::API_ENDPOINT,
            $from->format('d/m/Y'),
            $to->format('d/m/Y'),
            $valutaId
        );

        $request = new Request('GET', $url);
        $data = $this->sendRequest($request);
        $valutes = $this->parseValCurs($data);

        return new Collection($valutes);
    }

    /**
     * @param array $data
     *
     * @return ValuteCurs[]
     */
    protected function parseValCurs(array $data): array
    {
        return array_map(function (array $item) {
            return new ValuteCurs(
                (string)$item['@attributes']['Id'],
                (int)$item['Nominal'],
                floatval(str_replace(',', '.', $item['Value'])),
                new \DateTime($item['@attributes']['Date']),
            );
        }, $data['Record']);
    }
}