<?php

namespace App\Helper;

use App\Models\Album;

class GetAlbumPrice
{
    static function get_album_price($album_id)
    {
        $album_info = Album::query()
            ->where('id' , $album_id)
            ->first();

        return $album_info['price'];
    }
}
