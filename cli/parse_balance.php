<?php

declare(strict_types=1);

use App\Services\Http\HttpGuzzleClient;
use App\Services\Http\HttpScrap;
use App\Services\Notification\TelegramNotificationService;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$httpClient = new HttpGuzzleClient();
$scrapService = new HttpScrap($httpClient);
$telegramService = new TelegramNotificationService($httpClient);

$message = '';

try {
    $balance = $scrapService->process();

    if ($balance <= $_ENV['NOTICE_VALUE']) {
        $message = "Balance is $balance grn";
    }
} catch (Throwable $e) {
    $message = "Lk is unavailable";
}

if (!empty($message)) {
    $response = $telegramService->send($message);

    echo "Status: $response->status";
}
