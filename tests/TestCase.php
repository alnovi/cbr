<?php
declare(strict_types = 1);

namespace Cbr\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase as UnitTestCase;
use Psr\Http\Client\ClientInterface;

class TestCase extends UnitTestCase
{
    protected const XML_EMPTY = '/Data/empty.xml';
    protected const XML_ERROR = '/Data/error.xml';
    protected const XML_DAILY = '/Data/daily.xml';
    protected const XML_CURRENCY = '/Data/currency.xml';
    protected const XML_DYNAMIC = '/Data/dynamic.xml';

    /**
     * @param string $xmlFile
     *
     * @return string
     */
    protected static function getXmlFromFile(string $xmlFile): string
    {
        return file_get_contents(__DIR__ . $xmlFile);
    }

    /**
     * @param int $status
     * @param string $xmlFile
     *
     * @return ClientInterface
     */
    protected static function mockClient(int $status, string $xmlFile): ClientInterface
    {
        $response = new Response($status, [], self::getXmlFromFile($xmlFile));
        $mock = new MockHandler([$response]);

        return new Client([
            'handler' => HandlerStack::create($mock),
        ]);
    }
}
