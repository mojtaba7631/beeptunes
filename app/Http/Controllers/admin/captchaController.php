<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class captchaController extends Controller
{
    public function __construct()
    {

    }

    function index()
    {
        if (Session::has('my_captcha')) {
            Session::forget('my_captcha');
            Session::remove('my_captcha');
        }

        header("Content-type: image/png");
        $firstNumber = rand(0, 10);
        $secondNumber = rand(0, 10);

        $choice = rand(0, 1);

        if ($choice == 0) {
            $str = $firstNumber . ' + ' . $secondNumber;

            $img_handle = ImageCreate(100, 50) or die ("Error");
            $back_color = ImageColorAllocate($img_handle, 0, 0, 0);
            $txt_color = ImageColorAllocate($img_handle, 255, 255, 255);
            ImageString($img_handle, 31, 25, 15, $str, $txt_color);
            Imagepng($img_handle);
            $value = $firstNumber + $secondNumber;
        } else {

            if ($firstNumber > $secondNumber) {
                $str = $firstNumber . ' - ' . $secondNumber;
                $value = $firstNumber - $secondNumber;
            } else {
                $str = $secondNumber . ' - ' . $firstNumber;
                $value = $secondNumber - $firstNumber;
            }

            $img_handle = ImageCreate(100, 50) or die ("Error");
            $back_color = ImageColorAllocate($img_handle, 0, 0, 0);
            $txt_color = ImageColorAllocate($img_handle, 255, 255, 255);
            ImageString($img_handle, 31, 25, 15, $str, $txt_color);
            Imagepng($img_handle);
        }

        Session::push('my_captcha', $value);
        Session::save();
    }
}
