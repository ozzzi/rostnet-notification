<?php

declare(strict_types=1);

namespace App\Services\Notification;

use App\Services\Http\HttpHandler;
use App\Services\Http\HttpResponse;

class TelegramNotificationService implements Notification
{
    public function __construct(private readonly HttpHandler $httpClient)
    {
    }

    public function send(string $message): HttpResponse
    {
        $data = [
            'chat_id' => $_ENV['TELEGRAM_CHAT'],
            'text' => $message
        ];

        $url = "https://api.telegram.org/bot" . $_ENV['TELEGRAM_TOKEN'] . "/sendMessage?"
            . http_build_query($data);

        return $this->httpClient->get($url);
    }
}
