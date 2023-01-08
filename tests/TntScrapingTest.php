<?php

declare(strict_types=1);

namespace Tests;

use App\Services\Scraping\TntUserScaping;
use PHPUnit\Framework\TestCase;

class TntScrapingTest extends TestCase
{
    public function testBalance()
    {
        $html = <<<'HTML'
<!DOCTYPE html>
<html>
    <body>
        <div class="lk_lk_userdata">
            <span class="green_text bold_text label_h2">42.00 грн.</span>
        </div>
    </body>
</html>
HTML;
        $scraping = new TntUserScaping($html);

        $this->assertSame(42.0, $scraping->getBalance());
    }
}