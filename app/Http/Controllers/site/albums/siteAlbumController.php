<?php

namespace App\Http\Controllers\site\albums;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;

class siteAlbumController extends Controller
{
    public function index()
    {
        $albums_info = Album::query()
            ->get();

        return view('site.albums.index', compact('albums_info'));
    }

    public function album_detail($album_id)
    {
        $album_info = Album::query()
            ->where('id', $album_id)
            ->first();

        return view('site.albums.album_detail', compact('album_info'));
    }
}
