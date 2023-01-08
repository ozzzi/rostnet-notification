<?php

declare(strict_types=1);

namespace Tests;

use App\Services\Http\HttpGuzzleClient;
use PHPUnit\Framework\TestCase;

class HttpGuzzleClientTest extends TestCase
{
    private $httpClient;

    public function setUp(): void
    {
        $this->httpClient = new HttpGuzzleClient();
    }

    public function testGetMethod()
    {
        $response = $this->httpClient->get('google.com');

        $this->assertEquals(200, $response->status);
        $this->assertNotEmpty($response->content);
    }
}