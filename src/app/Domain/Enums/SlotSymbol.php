<?php

declare(strict_types=1);

namespace App\Domain\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self NINE()
 * @method static self TEN()
 * @method static self J()
 * @method static self Q()
 * @method static self K()
 * @method static self A()
 * @method static self CAT()
 * @method static self DOG()
 * @method static self MONKEY()
 * @method static self BIRDS()
 */
final class SlotSymbol extends Enum
{
    protected static function values(): array
    {
        return [
            'NINE' => '9',
            'TEN' => '10',
            'J' => 'J',
            'Q' => 'Q',
            'K' => 'K',
            'A' => 'A',
            'CAT' => 'Cat',
            'DOG' => 'Dog',
            'MONKEY' => 'Monkey',
            'BIRDS' => 'Birds',
        ];
    }

    public static function getRandomSymbol(): self
    {
        $symbol = array_rand(self::values(), 1);

        return self::from($symbol);
    }
}
