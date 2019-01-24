<?php

namespace App\Http\Models;

use App\Http\Helpers\Parser;
use App\Http\Helpers\Search;
use Illuminate\Database\Eloquent\Model;

class YoutubeFollowers extends Model
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
            $this->name = Parser::getYoutubeName($this->link);
        }
        return $this;
    }

    /**
     * Add followers count to model
     *
     * @return $this
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getYoutubeInformation()
    {
        $this->followers = Search::getYoutubeChanelInformation($this->name);
        return $this;
    }
}
