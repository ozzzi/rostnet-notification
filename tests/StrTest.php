<?php

declare(strict_types=1);

namespace Tests;

use App\Helpers\Str;
use PHPUnit\Framework\TestCase;

class StrTest extends TestCase
{
    public function testParseFloat()
    {
        $result = Str::parseFloat('баланс: 235.30 грн');
        $this->assertSame(235.3, $result);
    }
}