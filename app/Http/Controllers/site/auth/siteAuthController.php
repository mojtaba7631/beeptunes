<?php

namespace App\Http\Controllers\site\auth;

use App\Http\Controllers\Controller;
use App\Models\OTP;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class siteAuthController extends Controller
{
    public function login(): \Illuminate\Contracts\View\View
    {
        return view('login.site_login');
    }

    function doUserLogin(Request $request)
    {
        $input = $request->all();

        $validation = Validator::make($input, [
            'username' => 'required|regex:/(09)[0-9]{9}/|digits:11|numeric',
            'password' => 'required|string|max:255',
        ]);

        if ($validation->fails()) {
            toast()->error('', 'نام کاربری یا رمز عبور صحیح نیست')->autoClose(7500);
            return back();
        }

        $user = User::query()
            ->whereRelation('roles', 'role_id', '=', 2)
            ->where('mobile', '=', $input['username'])
            ->first();

        if (!$user) {
            toast()->error('', 'نام کاربری یا رمز عبور صحیح نیست')->autoClose(7500);
            return back();
        }

        if (intval($user['is_active']) === 0) {
            toast()->error('', 'حساب کاربری شما مسدود شده است لطفا با ادمین تماس بگیرید')->autoClose(7500);
            return back();
        }

        if (!password_verify($input['password'], $user['password'])) {
            toast()->error('', 'نام کاربری یا رمز عبور صحیح نیست')->autoClose(7500);
            return back();
        }

        auth()->login($user);

        toast()->success('', 'با موفقیت وارد شدید')->autoClose(7500);
        return redirect()->route('home');
    }

    public function doRegister(Request $request): \Illuminate\Http\JsonResponse
    {
        $input = $request->all();

        $validation = Validator::make($input, [
            'confirm_code' => 'required|string|max:255',
            'mobile' => 'required|regex:/(09)[0-9]{9}/|digits:11|numeric',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validation->errors()->first()
            ]);
        }

        $valid_otp = OTP::query()
            ->where('mobile', $input['mobile'])
            ->where('code', $input['confirm_code'])
            ->where('description', 'register otp')
//            ->whereِDate('updated_at', '>', Carbon::now()->subSeconds(120)->format('Y-m-d H:i:s'))
            ->first();

        if (!$valid_otp) {
            return response()->json([
                'error' => true,
                'message' => 'کد تایید صحیح نیست',
            ]);
        }

        $info = unserialize($valid_otp['fields']);

        $user_info = User::query()->create([
            'first_name' => $info['first_name'],
            'last_name' => $info['last_name'],
            'mobile' => $input['mobile'],
            'is_active' => 1,
        ]);

        $user_info->roles()->attach([
            'role_id' => 2
        ]);

        auth()->login($user_info);

        $valid_otp->delete();

        return response()->json([
            'error' => false,
            'message' => 'ثبت نام شما با موفقیت انجام شد'
        ]);
    }
}
