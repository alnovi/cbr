<?php

declare(strict_types = 1);

namespace Cbr\Services;

use Cbr\Contracts\ServiceInterface;
use Cbr\Exceptions\ParseDataException;
use Cbr\Exceptions\ServiceSendRequestException;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;

/**
 * Class Service
 * @package Cbr\Services
 */
abstract class Service implements ServiceInterface
{
    /**
     * @var ClientInterface
     */
    protected ClientInterface $httpClient;

    /**
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->httpClient = $client;
    }

    /**
     * @param RequestInterface $request
     *
     * @return array
     *
     * @throws ParseDataException
     * @throws ServiceSendRequestException
     */
    protected function sendRequest(RequestInterface $request): array
    {
        try {
            $response = $this->httpClient->sendRequest($request);

            if ($response->getStatusCode() !== 200) {
                throw new ServiceSendRequestException($response->getReasonPhrase(), $response->getStatusCode());
            }
        } catch (\Throwable $e) {
            throw new ServiceSendRequestException($e->getMessage(), $e->getCode(), $e);
        }

        return $this->xmlToArray($response->getBody()->getContents());
    }

    /**
     * @param string $xml
     *
     * @return array
     *
     * @throws ParseDataException
     */
    protected function xmlToArray(string $xml): array
    {
        libxml_use_internal_errors(true);
        $xml = simplexml_load_string($xml);

        if ($xml === false) {
            throw new ParseDataException("Error parsing XML");
        }

        $json = json_encode($xml);

        return json_decode($json, true) ?? [];
    }
}
