<?php

namespace App\Http\Helpers;


class Parser
{
    /**
     * Parse instagram link and get username
     *
     * @param $link
     * @return mixed
     */
    public static function getIstagramName($link)
    {
        $name = str_replace(env('INSTAGRAM_LINK'), '', $link);
        $name = explode('/', $name);
        return $name[0];
    }

    /**
     * Parse youtube link and get username
     *
     * @param $link
     * @return mixed
     */
    public static function getYoutubeName($link)
    {
        $name = str_replace(env('YOUTUBE_LINK'), '', $link);
        $name = explode('?', $name);
        return $name[0];
    }
}
