<?php

namespace App\Http\Models;

use App\Http\Helpers\Parser;
use App\Http\Helpers\Search;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
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

    public function checkUsername()
    {
        if (!$this->name) {
            $this->name = Parser::getUserName($this->link);
        }
        return $this;
    }

    public function getInstagramInformation()
    {
        $request = Search::findUsers($this->name);
        if ($request['found'] == true) {
            $this->followers = $request['user']->follower_count;
        }
        return $this;
    }
}
