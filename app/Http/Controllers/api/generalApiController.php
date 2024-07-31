<?php

namespace App\Http\Controllers\api;

use App\Helper\calculateCartTotalPrice;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class generalApiController extends Controller
{
    public function add_to_cart(Request $request): \Illuminate\Http\JsonResponse
    {
        $input = $request->all();

        $validation = Validator::make($input, [
            'album_id' => 'required',
            'cookie' => 'required',
        ]);

        if ($validation->fails()) {
            if (auth()->check()) {
                auth()->logout();
            }
            return response()->json([
                'error' => true,
                'message' => 'خطایی رخ داده است'
            ]);
        }

        $cookie = $input['cookie'];

        Cart::query()->create([
            'album_id' => $input['album_id'],
            'cookie' => $cookie,
        ]);

        $cart_count = Cart::query()
            ->where('cookie', $cookie)
            ->count();

        return response()->json([
            'error' => false,
            'message' => 'آلبوم به سبد خرید اضافه گردید',
            'cookie' => $cookie,
            'cart_count' => $cart_count,
        ]);
    }

    function remove_from_cart(Request $request): \Illuminate\Http\JsonResponse
    {
        $input = $request->all();

        $validation = Validator::make($input, [
            'album_id' => "required",
            'cookie' => "required|string|max:255",
        ]);

        if ($validation->fails() or $input['album_id'] == 0) {

            if (auth()->check()) {
                auth()->logout();
            }
            return response()->json([
                'error' => true,
                'message' => 'خطایی رخ داده است',
                'refresh' => true,
            ]);
        }

        $cart = Cart::query()
            ->where('cookie', $input['cookie'])
            ->where('album_id', $input['album_id'])
            ->first();

        if (!$cart) {
            if (auth()->check()) {
                auth()->logout();
            }
            return response()->json([
                'error' => true,
                'message' => 'خطایی رخ داده است',
                'refresh' => true,
            ]);
        }

        $cart->delete();

        $the_total_price = calculateCartTotalPrice::calculate_cart_total_price($input['cookie']);

        $cart_count = Cart::query()
            ->where('cookie', $input['cookie'])
            ->count();

        return response()->json([
            'error' => false,
            'message' => 'سبد خرید به روز رسانی شد',
            'the_total_price' => @number_format($the_total_price),
            'cart_count' => $cart_count,
        ]);
    }
}
