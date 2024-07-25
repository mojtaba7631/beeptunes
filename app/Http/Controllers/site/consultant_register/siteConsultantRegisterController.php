<?php

namespace App\Http\Controllers\site\consultant_register;

use App\Helper\ConvertDateToGregorian;
use App\Helper\RepairFileSrc;
use App\Http\Controllers\Controller;
use App\Models\ImageUser;
use App\Models\RoleUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class siteConsultantRegisterController extends Controller
{
    public function index()
    {
        return view('login.consultant_register');
    }
    public function store(Request $request)
    {
        $input = $request->all();

        $validation = Validator::make($input, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'mobile' => 'required|regex:/(09)[0-9]{9}/|digits:11|numeric',

        ]);

        if ($validation->fails()) {
            alert()->error($validation->errors()->first(), 'خطا !');
            return back()->withErrors($validation->errors())->withInput();
        }

        $user_info = User::query()->create([
           'first_name' => $input['first_name'],
           'last_name' => $input['last_name'],
           'mobile' => $input['mobile'],
           'email' => 'test@'.Carbon::now().'@test.com',
           'is_active' => 0,
        ]);

        RoleUser::query()->create([
           'role_id' => 3 ,
           'user_id' => $user_info['id'] ,
        ]);

        alert()->success('','با تشکر از عضویت شما در سایت نیزوا');
        return redirect()->route('home');
    }
}
