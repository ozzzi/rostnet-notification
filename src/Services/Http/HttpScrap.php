<?php

declare(strict_types=1);

namespace App\Services\Http;

use App\Helpers\Str;
use App\Services\Scraping\TntUserScaping;

class HttpScrap
{
    private const AUTH_URL = 'http://my.tntnet.com.ua/user/index.php';

    public function __construct(private readonly HttpHandler $httpClient)
    {
    }

    /**
     * @return float
     * @throws \Exception
     */
    public function process(): float
    {
        $response = $this->httpClient->post(self::AUTH_URL, [
            'type' => 'userlogin',
            'us_abon_login' => $_ENV['LOGIN'],
            'us_abon_pass' => $_ENV['PASSWORD']
        ]);

        $lkContent = Str::encodingWinToUtf($response->content);

        if ($response->status !== 200) {
            throw new \Exception("Service is unavailable");
        }

        return (new TntUserScaping($lkContent))->getBalance();
    }
}
