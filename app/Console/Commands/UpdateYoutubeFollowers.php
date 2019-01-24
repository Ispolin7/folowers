<?php

namespace App\Console\Commands;

use App\Http\Controllers\FollowersController;
use Illuminate\Console\Command;

class UpdateYoutubeFollowers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'followers-update:youtube';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update youtube followers in DB';

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
        (new FollowersController())->updateYoutubeFollowers();
    }
}
