<?php

namespace App\Services;

use GuzzleHttp\Client;

class FriendService
{
    public function getUserFriends($user)
    {
        $client = new Client();
        $reponse = $client->request('get', "https://graph.facebook.com/v12.0/$user/friends", [
            'query' => [
                'access_token' => session('token')
            ]
        ]);
        $reponse = json_decode($reponse->getBody()->getContents());
        
        return $reponse->data;
    }
}