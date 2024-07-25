<?php

namespace App\Helper;

use App\Models\Album;

class GetAlbumAuthor
{
    static function get_album_author($album_id)
    {
        $album_info = Album::query()
            ->where('id' , $album_id)
            ->first();

        return $album_info['album_author'];
    }
}
