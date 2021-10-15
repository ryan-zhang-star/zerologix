<?php

namespace App\Http\Controllers;

use App\Services\PostService;

class PostController extends Controller
{
    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $user = auth()->user()->facebook_id;
        $posts = $this->postService->getUserPosts($user);

        return view('posts.index', compact('posts'));
    }

    public function comments($post)
    {
        $comments = $this->postService->getPostComments($post);

        return view('comments.index', compact('comments'));
    }
}
