<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Parser;
use App\Http\Helpers\Search;
use App\Http\Models\InstagramFollower;
use App\Http\Models\YoutubeFollowers;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FollowersController extends Controller
{
    /**
     * Update information in instagram followers DB
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateInstagramFollowers()
    {
        $needUpdate = InstagramFollower::whereDate('updated_at', '<', Carbon::today()->subDays(3)->toDateString())
            ->orWhere('updated_at', null)
            ->limit(env('UPDATE_LIMIT'))
            ->get();
        if ($needUpdate) {
            foreach ($needUpdate as $item) {
                /** @var InstagramFollower $item */
                $item->checkUsername()->getInstagramFollowers()->touch();
            }
        }
    }

    /**
     * Update information in youtube followers DB
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateYoutubeFollowers()
    {
        $needUpdate = YoutubeFollowers::whereDate('updated_at', '<', Carbon::today()->subDays(3)->toDateString())
            ->orWhere('updated_at', null)
            ->limit(env('UPDATE_LIMIT'))
            ->get();
        if ($needUpdate) {
            foreach ($needUpdate as $item) {
                /** @var YoutubeFollowers $item */
                $item->checkUsername()->getYoutubeInformation()->touch();
            }
        }
    }
}
