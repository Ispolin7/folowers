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
    public static function findInstagramUsers($username)
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

    /**
     * Get followers count
     *
     * @param $username
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getYoutubeChanelInformation($username)
    {
        $client = new Client();
        $response = $client->request('GET', env('YOUTUBE_API_LINK'), [
            'query' => [
                'part' => 'statistics',
                'id' => $username,
                'key' => env('YOUTUBE_API_KEY')
            ]
        ]);
        $body = $response->getBody();
        $result = json_decode($body);
        if($response->getStatusCode() == 200 || $result) {
            return $result->items[0]->statistics->subscriberCount;
        }
        return null;

    }
}
