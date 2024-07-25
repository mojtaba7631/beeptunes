<?php

namespace App\Helper;

use App\Models\Album;

class GetAlbumType
{
    static function get_album_type($album_id)
    {
        $album_info = Album::query()
            ->where('id' , $album_id)
            ->first();

        if ($album_info['album_type'] == 0){
            $album_type = 'دانلودی';
        }
        else{
            $album_type = 'فیزیکی' ;
        }

        return $album_type;
    }
}
