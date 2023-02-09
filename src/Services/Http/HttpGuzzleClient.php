<?php

declare(strict_types=1);

namespace App\Services\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class HttpGuzzleClient implements HttpHandler
{
    public function __construct(
        private readonly Client $client
    ) {
    }

    /**
     * @throws GuzzleException
     */
    public function get(string $url): HttpResponse
    {
        $response = $this->client->get($url);

        return new HttpResponse(
            status: $response->getStatusCode(),
            content: (string) $response->getBody()
        );
    }

    /**
     * @throws GuzzleException
     */
    public function post(string $url, array $data): HttpResponse
    {
        $response = $this->client->post($url, [
            'form_params' => $data
        ]);

        return new HttpResponse(
            status: $response->getStatusCode(),
            content: (string) $response->getBody()
        );
    }
}
