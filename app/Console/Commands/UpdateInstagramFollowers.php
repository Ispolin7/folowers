<?php

namespace App\Console\Commands;

use App\Http\Controllers\FollowersController;
use App\Http\Models\InstagramFollower;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Http\Request;

class UpdateInstagramFollowers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'followers-update:instagram';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update istagram followers in DB';

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
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function handle()
    {
        (new FollowersController())->updateInstagramFollowers();
    }

}
