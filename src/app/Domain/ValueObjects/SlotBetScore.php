<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

final class SlotBetScore
{
    private int $score;

    private array $draws;

    public function __construct(int $score, array $draws)
    {
        $this->score = $score;
        $this->draws = $draws;
    }

    public function getScrore(): int
    {
        return $this->score;
    }

    public function getDraws(): array
    {
        return $this->draws;
    }
}
