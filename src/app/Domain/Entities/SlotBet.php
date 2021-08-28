<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use App\Domain\ValueObjects\SlotBetScore;
use App\Domain\ValueObjects\SlotBoard;
use App\Domain\ValueObjects\SlotDraw;

final class SlotBet
{
    private const SIZE = 5;

    private SlotBoard $slotBoard;

    public function __construct()
    {
        $this->slotBoard = SlotBoard::GenerateBoard();
    }

    public function score() : SlotBetScore
    {
        $betDraw = $this->draw();

        $score = $this->calculateScore($betDraw);

        return new SlotBetScore($score, $betDraw);
    }

    private function draw(): array
    {
        $betDraw = [];
        for ($i = 0; $i < self::SIZE; $i++) {
            $row = rand(0, 2);
            $colum = rand(0, 4);

            $betDraw[] = $this->slotBoard->getValue($row, $colum);
        }

        return $betDraw;
    }

    private function calculateScore(array $betDraw): int
    {
        $score = 0;

        /** @var SlotDraw $firstDraw */
        $firstDraw = $betDraw[0];

        /** @var SlotDraw $draw */
        foreach ($betDraw as $draw) {
            if ($firstDraw->getSlotSymbol() == $draw->getSlotSymbol()) {
                $score++;
            } else {
                break;
            }
        }

        return $score;
    }
}
