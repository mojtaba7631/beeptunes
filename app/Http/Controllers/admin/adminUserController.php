<?php

namespace App\Http\Controllers\admin;

use App\Helper\RepairFileSrc;
use App\Http\Controllers\Controller;
use App\Models\Gender;
use App\Models\Image;
use App\Models\ImageUser;
use App\Models\User;
use App\Rules\national_code;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class adminUserController extends Controller
{
    function index()
    {
        $users = User::query()
            ->select('*', 'users.id as user_id')
            ->leftJoin('genders', 'genders.gender_id', '=', 'users.gender')
            ->latest()
            ->paginate(15);

        $searched = false;
        return view('admin.users.index', compact('users', 'searched'));
    }

    function search(Request $request)
    {
        $input = $request->all();

        if ($request->has('first_name') and $input['first_name'] != '') {
            $first_name = $input['first_name'];
        } else {
            $first_name = '';
        }

        if ($request->has('last_name') and $input['last_name'] != '') {
            $last_name = $input['last_name'];
        } else {
            $last_name = '';
        }

        if ($request->has('gender') and $input['gender'] != '') {
            $gender = $input['gender'];
        } else {
            $gender = 0;
        }

        $users = User::query()
            ->select('*', 'users.id as user_id')
            ->leftJoin('genders', 'genders.gender_id', '=', 'users.gender')
            ->when($first_name != '', function ($q) use ($first_name) {
                $q->where('users.first_name', 'like', '%' . $first_name . '%');
            })
            ->when($last_name != '', function ($q) use ($last_name) {
                $q->where('users.last_name', 'like', '%' . $last_name . '%');
            })
            ->when($gender != 0, function ($q) use ($gender) {
                $q->where('users.gender', $gender);
            })
            ->latest('users.created_at')
            ->get();

        $searched = true;
        return view('admin.users.index', compact('users', 'searched'));
    }

    function edit($user_id)
    {
        $this_user_info = User::query()
            ->select('*', 'users.id as user_id')
            ->leftJoin('genders', 'genders.gender_id', '=', 'users.gender')
            ->where('id', $user_id)
            ->firstOrFail();

        //get profile image
        $images = $this_user_info->images;
        $placeholder = asset('admin/assets/images/placeholders/user_placeholder.png');
        $profile = $this->get_user_image($images, 'profile', $placeholder, false);
        $this_user_info['profile'] = $profile;

        $genders = Gender::all();

        return view('admin.users.edit', compact('this_user_info', 'genders'));
    }

    function update(Request $request, $user_id)
    {
        $input = $request->all();

        $validation = Validator::make($input, [
            'status' => "required|integer|max:1",
            'first_name' => "required|string|max:255",
            'last_name' => "required|string|max:255",
            'national_code' => ["nullable", new national_code],
            'birth_day' => "nullable|string|max:255",
            'gender' => "string|max:255",
            'mobile' => 'nullable|regex:/(09)[0-9]{9}/|digits:11|numeric',
            'profile' => "nullable|mimes:png,jpg,jpeg|max:2560", //2.5 MG
        ]);

        if ($validation->fails()) {
            alert()->error($validation->errors()->first(), 'خطا !');
            return back()->withErrors($validation->errors());
        }

        $user = User::query()
            ->where('id', $user_id)
            ->firstOrFail();

        $user->update([
            'is_active' => intval($input['status']),
            'first_name' => $input['first_name'],
            'mobile' => $input['mobile'],
            'last_name' => $input['last_name'],
            'national_code' => $input['national_code'],
            'gender' => $input['gender'],
            'birth_day' => $input['birth_day'] != '' ? $this->convertDateToGregorian($input['birth_day']) : $user['birth_day'],
        ]);

        if ($request->has('profile')) {
            //get profile image and delete old profile

            $image_user = ImageUser::query()
                ->where('user_id',$user['id'])
                ->where('image_id',1)
                ->first();


            $images = $user->images;
            $placeholder = false;
            $profile = $this->get_user_image($images, 'profile', $placeholder, true);
            if ($profile != '' and file_exists($profile) and !is_dir($profile)) {
                unlink($profile);
            }

            $file = $request->file('profile');
            $file_ext = $file->getClientOriginalExtension();
            $file_name = 'profile_' . time() . '.' . $file_ext;
            $profile = RepairFileSrc::rapair_file_src($file->move('site\assets\user_images', $file_name));

            $image = Image::query()
                ->where('image_name', 'profile')
                ->first();

            $forSync = [
                $image['image_id'] => [
                    'image_src' => $profile
                ]
            ];

            $user->images()->sync($forSync, false);
        }

        alert()->success('','کاربر با موفقیت ویرایش شد.');
        return back();
    }

    function get_user_image($images, $image_name, $placeholder, $withoutAsset)
    {
        $profile = $placeholder;
        foreach ($images as $image) {
            if ($image['image_name'] == $image_name) {
                $profile = $image->pivot->image_src;
                break;
            }
        }

        if (file_exists($profile) and !is_dir($profile)) {
            if ($withoutAsset) {
                return $profile;
            } else {
                return asset($profile);
            }
        } else {
            if ($placeholder) {
                return $placeholder;
            } else {
                return '';
            }
        }
    }

    function convertDateToGregorian($date)
    {
        $date = explode('/', $date);
        $date = verta()->getGregorian($this->convertDigitsToEnglish($date[0]), $this->convertDigitsToEnglish($date[1]), $this->convertDigitsToEnglish($date[2]));
        return join('-', $date);
    }

    public function convertDateToJalali($date)
    {
        $jalali_date = verta($date)->format('j/%B/Y');
        return $jalali_date;
    }

    function convertDigitsToEnglish($string)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠'];

        $num = range(0, 9);
        $convertedPersianNums = str_replace($persian, $num, $string);
        $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);

        return $englishNumbersOnly;
    }

    public function is_active($id){
        $user_info = User::query()
            ->where('id',$id)
            ->first();

//        if ($user_info['is_active'] == 0){
//            $user_info->update([
//
//            ])
//        }
    }
}
