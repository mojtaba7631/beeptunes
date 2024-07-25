<?php

namespace App\Helper;

use App\Models\Album;

class GetAlbumTypeNumber
{
    static function get_album_type_number($album_id)
    {
        $album_info = Album::query()
            ->where('id' , $album_id)
            ->first();

        return $album_info['album_type'];
    }
}
