<?php

namespace App\Http\Controllers;

use App\Services\FriendService;

class FriendController extends Controller
{
    private $friendService;

    public function __construct(FriendService $friendService)
    {
        $this->friendService = $friendService;
    }

    public function index()
    {
        $user = auth()->user()->facebook_id;
        $friends = $this->friendService->getUserFriends($user);

        return view('friends.index', compact('friends'));
    }
}
