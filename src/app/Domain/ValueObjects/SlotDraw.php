<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use App\Domain\Enums\SlotSymbol;

final class SlotDraw
{
    private int $value;

    private SlotSymbol $slotSymbol;

    public function __construct(int $value, SlotSymbol $slotSymbol)
    {
        $this->value = $value;
        $this->slotSymbol = $slotSymbol;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function getSlotSymbol(): SlotSymbol
    {
        return $this->slotSymbol;
    }
}
