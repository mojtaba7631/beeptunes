<?php

namespace App\Http\Controllers\site\posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class postController extends Controller
{
    public function index()
    {
        $posts = Post::query()
            ->paginate(4);
        return view('site.posts.index', compact('posts'));
    }

    public function post_detail($post_id)
    {
        $post_info = Post::query()
            ->where('id',$post_id)
            ->first();

        return view('site.posts.post_detail',compact('post_info'));
    }
}
