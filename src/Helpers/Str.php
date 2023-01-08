<?php

declare(strict_types=1);

namespace App\Helpers;

class Str
{
    public static function parseFloat(string $value): float
    {
        preg_match('/(\d+\.\d+)/u', $value, $matches);

        return (float) $matches[0];
    }

    public static function encodingWinToUtf(string $value): string
    {
        return iconv('windows-1251', 'utf-8', $value);
    }
}