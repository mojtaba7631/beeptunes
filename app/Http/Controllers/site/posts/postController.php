<?php

namespace App\Http\Controllers\site\posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class postController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View
    {
        $posts = Post::query()
            ->latest()
            ->paginate(12);

        return view('site.posts.index', compact('posts'));
    }

    public function post_detail($post_nickname): \Illuminate\Contracts\View\View
    {
        $post_info = Post::query()
            ->where('post_nickname', $post_nickname)
            ->firstOrFail();

        return view('site.posts.post_detail', compact('post_info'));
    }
}
