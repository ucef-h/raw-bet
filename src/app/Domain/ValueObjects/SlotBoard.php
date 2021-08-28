<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use App\Domain\Enums\SlotSymbol;

final class SlotBoard
{
    private array $matrix;

    private function __construct()
    {
        $this->matrix = [];
    }

    public static function GenerateBoard(): self
    {
        $self = new self();
        $self->matrix = self::buildMatrix();

        return $self;
    }

    public function getValue(int $row, int $colum): SlotDraw
    {
        return $this->matrix[$row][$colum];
    }

    private static function buildMatrix(): array
    {
        $matrix = [];

        foreach (SymbolWeight::GetMatrix() as $row) {
            $matrixColumn = [];
            foreach ($row as $value) {
                $matrixColumn[] = new SlotDraw($value, SlotSymbol::getRandomSymbol());
            }
            $matrix[] = $matrixColumn;
        }

        return $matrix;
    }
}
