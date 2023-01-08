<?php

declare(strict_types=1);

namespace App\Services\Http;

interface HttpHandler
{
    public function get(string $url): HttpResponse;

    public function post(string $url, array $data): HttpResponse;
}