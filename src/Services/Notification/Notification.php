<?php

declare(strict_types=1);

namespace App\Services\Notification;

use App\Services\Http\HttpResponse;

interface Notification
{
    public function send(string $message): HttpResponse;
}