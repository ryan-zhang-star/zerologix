<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $client = new Client();
        $reponse = $client->request('get', "https://graph.facebook.com/v12.0/me/feed", [
            'query' => [
                'access_token' => session('token')
            ]
        ]);
        dd($reponse->getBody()->getContents());
    }
}
