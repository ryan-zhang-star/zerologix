<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $client = new Client();
        $id = auth()->user()->facebook_id;
        $reponse = $client->request('get', "https://graph.facebook.com/v12.0/$id/posts", [
            'query' => [
                'access_token' => session('token')
            ]
        ]);
        $reponse = json_decode($reponse->getBody()->getContents());
        $posts = $reponse->data;

        return view('posts.index', compact('posts'));
    }

    public function comments($id)
    {
        $client = new Client();
        $reponse = $client->request('get', "https://graph.facebook.com/v12.0/$id/comments", [
            'query' => [
                'access_token' => session('token')
            ]
        ]);
        $reponse = json_decode($reponse->getBody()->getContents());
        $comments = $reponse->data;

        return view('comments.index', compact('comments'));
    }
}
