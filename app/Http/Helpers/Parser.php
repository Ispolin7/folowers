<?php

namespace App\Http\Helpers;


class Parser
{
    /**
     * Parse link and get username
     *
     * @param $link
     * @return mixed
     */
    public static function getUserName($link)
    {
        $name = str_replace(env('INSTAGRAM_LINK'), '', $link);
        $name = explode('/', $name);
        return $name[0];
    }
}
