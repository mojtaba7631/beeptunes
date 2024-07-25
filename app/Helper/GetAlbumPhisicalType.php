<?php

namespace App\Helper;

use App\Models\Album;
use App\Models\Cart;

class GetAlbumPhisicalType
{
    static function get_album_phisical_type($cookie)
    {
        $cart_info = Cart::query()
            ->where('cookie' , $cookie)
            ->get();

        foreach ($cart_info as $item) {
            $album_info = Album::query()
                ->where('id' , $item['album_id'])
                ->first();

            $result = array();

            array_push($result , $album_info['album_type']) ;

        }

        return $result ;

    }
}
