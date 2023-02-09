<?php

declare(strict_types=1);

namespace Tests;

use App\Services\Http\HttpGuzzleClient;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class HttpGuzzleClientTest extends TestCase
{
    private $httpClient;

    public function setUp(): void
    {
        $mock = new MockHandler([
            new Response(200, ['X-Foo' => 'Bar'], 'Hello, World'),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $this->httpClient = new HttpGuzzleClient(new Client(['handler' => $handlerStack]));
    }

    public function testGetMethod()
    {
        $response = $this->httpClient->get('/');

        $this->assertEquals(200, $response->status);
        $this->assertEquals('Hello, World', $response->content);
    }
}