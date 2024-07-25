<?php

namespace App\Helper;

use App\Models\Album;

class GetAlbumName
{
    static function get_album_name($album_id)
    {
        $album_info = Album::query()
            ->where('id' , $album_id)
            ->first();

        return $album_info['album_title'];
    }
}
