<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Parser;
use App\Http\Helpers\Search;
use Illuminate\Http\Request;

class FollowersController extends Controller
{
    /**
     * Looking user in instagram for a given link and get the number of its followers
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getFollowersFromLink(Request $request)
    {
        $username = Parser::getUserName($request->link);
        $result = Search::findUsers($username);

        return view('result', compact('result'));
    }

    /**
     * Looking user in instagram for a given name and get the number of its followers
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getFollowersFromName(Request $request)
    {
        $result = Search::findUsers($request->name);

        return view('result', compact('result'));
    }
}
