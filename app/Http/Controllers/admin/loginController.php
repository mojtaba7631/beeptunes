<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class loginController extends Controller
{
    function index()
    {
        return view('login.login');
    }

    function do_login(Request $request)
    {
        $input = $request->all();

        if ($request->session()->has('my_captcha') and $input['captcha_code'] == $request->session()->get('my_captcha')[0]) {
            $validation = Validator::make($input, [
                'email' => 'required|string|max:255',
                'password' => 'required|string|max:255',
            ]);

            if ($validation->fails()) {
                alert()->error($validation->errors()->first(), 'خطا');
                return back()->withInput()->withErrors(['auth' => 'کلمه عبور یا نام کاربری اشتباه است.']);
            }

            $email = $input['email'];
            $password = $input['password'];

            if (auth()->attempt(['email' => $email, 'password' => $password])) {
                return redirect()->route('admin.dashboard');
            } else {
                alert()->error('کلمه عبور یا نام کاربری اشتباه است.', 'خطا');
                return back()->withInput()->withErrors(['auth' => 'کلمه عبور یا نام کاربری اشتباه است.']);
            }
        } else {
            alert()->error('کد امنیتی صحیح نیست', 'خطا');
            return back()->withInput()->withErrors(['auth' => 'کد امنیتی صحیح نیست']);
        }
    }
}
