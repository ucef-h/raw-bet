<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

final class BetRewardConfig
{
    public function __construct()
    {
    }

    public function GetFees(): int
    {
        return 1;
    }

    public function GetPercentage(int $score): int
    {
        return self::GetList()[$score];
    }

    private static function GetList(): array
    {
        return [
            0,
            0,
            0,
            20,
            200,
            2000,
        ];
    }
}
