<?php

declare(strict_types=1);

namespace App\Services\Http;

final class HttpResponse
{
    public function __construct(
        public readonly int $status,
        public readonly string $content
    ) {
    }
}
