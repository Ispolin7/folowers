<?php

namespace App\Http\Helpers;

use GuzzleHttp\Client;

class Search
{

    /**
     * Make a request to instagram
     *
     * @param $username
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function findUsers($username)
    {
        $client = new Client();
        $response = $client->request('GET', env('INSTAGRAM_SEARCH_LINK'), [
            'query' => [
                'query' => $username
            ]
        ]);
        $body = $response->getBody();
        $result = json_decode($body);
        return self::getUserInformation($result->users, $username);
    }

    /**
     * Compare the results with the incoming
     *
     * @param $users
     * @param $username
     * @return array
     */
    public static function getUserInformation($users, $username)
    {
        foreach ($users as $member) {
            if ($member->user->username == $username) {
                return [
                    'found' => true,
                    'user' => $member->user
                ];
            }
        }
        return [
            'found' => false
        ];
    }
}
