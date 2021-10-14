<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function index()
    {
        $client = new Client();
        $id = auth()->user()->facebook_id;
        $reponse = $client->request('get', "https://graph.facebook.com/v12.0/$id/friends", [
            'query' => [
                'access_token' => session('token')
            ]
        ]);
        $reponse = json_decode($reponse->getBody()->getContents());
        $friends = $reponse->data;

        return view('friends.index', compact('friends'));
    }
}
