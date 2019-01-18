<?php

namespace App\Console\Commands;

use App\Http\Models\Follower;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Http\Request;

class CallRoute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:followers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'php artsian update:followers';

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
     * @return mixed
     */
    public function handle()
    {
        $needUpdate = Follower::whereDate('updated_at', '<', Carbon::today()->subDays(3)->toDateString())
            ->orWhere('updated_at', null)
            ->limit(5)
            ->get();
        if ($needUpdate) {
            foreach ($needUpdate as $item) {
                /** @var Follower $item */
                $item->checkUsername()->getInstagramInformation()->touch();
            }
        }
    }

}
