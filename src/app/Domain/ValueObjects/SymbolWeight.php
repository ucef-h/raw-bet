<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

final class SymbolWeight
{
    private function __construct()
    {
    }

    public static function GetMatrix(): array
    {
        return [
            [0, 3, 6, 9, 12],
            [1, 4, 7, 10, 13],
            [2, 5, 8, 11, 14],
        ];
    }
}
