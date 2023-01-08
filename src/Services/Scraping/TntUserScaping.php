<?php

declare(strict_types=1);

namespace App\Services\Scraping;

use App\Helpers\Str;
use Symfony\Component\DomCrawler\Crawler;

class TntUserScaping
{
    private Crawler $crawler;

    public function __construct(string $html)
    {
        $this->crawler = new Crawler($html);
    }

    public function getBalance(): float
    {
        $content = $this->crawler->filter('.label_h2')->text();

        return Str::parseFloat($content);
    }
}