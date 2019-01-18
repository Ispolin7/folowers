<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Parser;
use App\Http\Helpers\Search;
use App\Http\Models\Follower;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FollowersController extends Controller
{
    /**
     * Update information in followers DB
     *
     */
    public function update()
    {
        $needUpdate = Follower::whereDate('updated_at', '<', Carbon::today()->subDays(3)->toDateString())
            ->orWhere('updated_at', null)
            ->get();
        if ($needUpdate) {
            foreach ($needUpdate as $item) {
                /** @var Follower $item */
                $item->checkUsername()->getInstagramInformation()->touch();
            }
        }
        return view('welcome');
    }
}
