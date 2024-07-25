<?php

namespace App\Http\Controllers\site\home;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Event;
use App\Models\ImageUser;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $posts = Post::query()
            ->take(3)
            ->get();

        $user_info = User::query()
            ->select('*', 'users.id as user_id')
            ->join('genders', 'genders.gender_id', '=', 'users.gender')
            ->join('role_user', 'role_user.user_id', '=', 'users.id')
            ->where('role_id',3)
            ->where('is_active',1)
            ->get();

        foreach ($user_info as $user){
            $user['image'] = ImageUser::query()
                ->where('user_id',$user['user_id'])
                ->where('image_id',1)
                ->first();
        }

        $event_info = Event::query()
            ->where('main',1)
            ->first();


        $albums_info = Album::query()
            ->get();

        return view('site.home.index',compact('posts' , 'user_info','event_info','albums_info'));
    }
}
