<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Domain\Entities\BetRewards;
use App\Domain\Entities\SlotBet;
use App\Domain\ValueObjects\BetRewardConfig;
use App\Domain\ValueObjects\SlotDraw;

class SlotCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'slot:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Slot Command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $slotBet = new SlotBet();
        $score = $slotBet->score();

        $rewards = new BetRewards($score, new BetRewardConfig());

        $this->table(['Symbols'], array_map(function (SlotDraw $draw) {
            return ['symbols' => $draw->getSlotSymbol()->label];
        }, $score->getDraws()));

        $this->info('Rewards: '.$rewards->finalReward());

        return 0;
    }
}
