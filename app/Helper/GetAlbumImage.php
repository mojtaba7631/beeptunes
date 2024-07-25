<?php

namespace App\Helper;

use App\Models\Album;

class GetAlbumImage
{
    static function get_album_image($album_id)
    {
        $album_info = Album::query()
            ->where('id' , $album_id)
            ->first();

        return $album_info['album_image'];
    }
}
