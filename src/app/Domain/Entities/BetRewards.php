<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use App\Domain\ValueObjects\BetRewardConfig;
use App\Domain\ValueObjects\SlotBetScore;

final class BetRewards
{
    private BetRewardConfig $betConfig;

    private SlotBetScore $score;

    public function __construct(SlotBetScore $score, BetRewardConfig $config)
    {
        $this->score = $score;
        $this->betConfig = $config;
    }

    public function finalReward(): int
    {
        $percentage = $this->betConfig->GetPercentage($this->score->getScrore());

        return $this->betConfig->GetFees() * $percentage;
    }

    public function draw(): array
    {
        return $this->score->getDraws();
    }

    public function score(): int
    {
        return $this->score->getScrore();
    }
}
