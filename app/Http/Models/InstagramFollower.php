<?php

namespace App\Http\Models;

use App\Http\Helpers\Parser;
use App\Http\Helpers\Search;
use Illuminate\Database\Eloquent\Model;

class InstagramFollower extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'link',
        'name',
        'followers'
    ];

    /**
     * Check name in DB and add it if needed
     *
     * @return $this
     */
    public function checkUsername()
    {
        if (!$this->name) {
            $this->name = Parser::getIstagramName($this->link);
        }
        return $this;
    }

    /**
     * Find user and get followers
     *
     * @return $this
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getInstagramFollowers()
    {
        $request = Search::findInstagramUsers($this->name);
        if ($request['found'] == true) {
            $this->followers = $request['user']->follower_count;
        }
        return $this;
    }
}
