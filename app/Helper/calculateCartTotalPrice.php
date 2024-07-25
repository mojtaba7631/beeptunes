<?php

namespace App\Helper;

use App\Models\Album;
use App\Models\Cart;

class calculateCartTotalPrice
{
    static function calculate_cart_total_price($cookie)
    {
        $cart = Cart::query()
            ->where('cookie', $cookie)
            ->get();


        if (!$cart) {
            return 0;
        }

        $total_price = 0;

        foreach ($cart as $item) {
            $album_info = Album::query()
                ->where('id', $item['album_id'])
                ->first();

            $price = $album_info['price'];

            $total_price += $price;
        }

        return $total_price;

    }
}
