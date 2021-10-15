<?php

namespace App\Services;

use GuzzleHttp\Client;

class PostService
{
    public function getUserPosts($user)
    {
        $client = new Client();
        $reponse = $client->request('get', "https://graph.facebook.com/v12.0/$user/posts", [
            'query' => [
                'access_token' => session('token')
            ]
        ]);
        $reponse = json_decode($reponse->getBody()->getContents());
        
        return $reponse->data;
    }

    public function getPostComments($post)
    {
        $client = new Client();
        $reponse = $client->request('get', "https://graph.facebook.com/v12.0/$post/comments", [
            'query' => [
                'access_token' => session('token')
            ]
        ]);
        $reponse = json_decode($reponse->getBody()->getContents());
        
        return $reponse->data;
    }
}