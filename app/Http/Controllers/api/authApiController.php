<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\OTP;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class authApiController extends Controller
{
    public function send_register_confirm_code(Request $request)
    {
        $input = $request->all();

        $validation = Validator::make($input, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'mobile' => 'required|regex:/(09)[0-9]{9}/|digits:11|numeric',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validation->errors()->first()
            ]);
        }

        $code = rand(10000, 99999);

        $exist_otp = OTP::query()
            ->where('mobile', $input['mobile'])
            ->where('description', 'register otp')
            ->first();

        if (!$exist_otp) {
            OTP::query()->create([
                'mobile' => $input['mobile'],
                'code' => $code,
                'description' => 'register otp',
                'fields' => serialize($input),
            ]);
        } else {
            $exist_otp->update([
                'fields' => serialize($input),
                'code' => $code,
            ]);
        }

        $user_exist = User::query()
            ->where('mobile', $input['mobile'])
            ->count();

        if ($user_exist > 0) {
            return response()->json([
                'error' => true,
                'message' => 'شماره موبایبل تکراری است'
            ]);
        }

        return response()->json([
            'error' => false,
            'message' => 'کد تایید برای شما پیامک شد'
        ]);
    }
}
