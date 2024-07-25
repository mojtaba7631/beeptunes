<?php

namespace App\Http\Controllers\site\cart;

use App\Helper\calculateCartTotalPrice;
use App\Helper\GetAlbumAuthor;
use App\Helper\GetAlbumImage;
use App\Helper\GetAlbumName;
use App\Helper\GetAlbumPhisicalType;
use App\Helper\GetAlbumPrice;
use App\Helper\GetAlbumType;
use App\Helper\GetAlbumTypeNumber;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Album;
use App\Models\Cart;

class siteCartController extends Controller
{
    public function index()
    {


        if (isset($_COOKIE['cart'])) {
            $cart = Cart::query()
                ->where('cookie', $_COOKIE['cart'])
                ->paginate(30);

            foreach ($cart as $item) {
                $item['album_image'] = GetAlbumImage::get_album_image($item['album_id']);
                $item['album_title'] = GetAlbumName::get_album_name($item['album_id']);
                $item['album_author'] = GetAlbumAuthor::get_album_author($item['album_id']);
                $item['album_price'] = GetAlbumPrice::get_album_price($item['album_id']);
                $item['album_type_number'] = GetAlbumTypeNumber::get_album_type_number($item['album_id']);

            }

            $the_total_price = calculateCartTotalPrice::calculate_cart_total_price($_COOKIE['cart']);

        } else {
            $cart = [];
        }


        return view('site.cart.index', compact('cart', 'the_total_price'));
    }

    function checkout()
    {
        $phisical = 0 ;
        $download = 0 ;
        if (isset($_COOKIE['cart'])) {
            $cart = Cart::query()
                ->where('cookie', $_COOKIE['cart'])
                ->get();

            foreach ($cart as $item) {
                $item['album_image'] = GetAlbumImage::get_album_image($item['album_id']);
                $item['album_title'] = GetAlbumName::get_album_name($item['album_id']);
                $item['album_author'] = GetAlbumAuthor::get_album_author($item['album_id']);
                $item['album_price'] = GetAlbumPrice::get_album_price($item['album_id']);
                $item['album_type'] = GetAlbumType::get_album_type($item['album_id']);
                $item['album_type_number'] = GetAlbumTypeNumber::get_album_type_number($item['album_id']);

                if ($item['album_type_number'] == 0) {
                    $download = 1;
                } else if ($item['album_type_number'] == 1){
                    $phisical = 1;
                }
            }

            $addresses = Address::query()
                ->where('user_id', auth()->id())
                ->get();

            $the_total_price = calculateCartTotalPrice::calculate_cart_total_price($_COOKIE['cart']);
        } else {
            $cart = [];
        }

        if (empty($cart) or empty($cart->all())) {
            alert()->error('', 'سبد خرید شما خالی است');
            return redirect()->route('home');
        }

//        $shipping_types = Shipping::query()->get();

        return view('site.checkout.index', compact('cart', 'the_total_price','phisical','addresses'));
    }
}
