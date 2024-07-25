<?php

namespace App\Http\Controllers\admin\about_us;

use App\Helper\RepairFileSrc;
use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class adminAboutController extends Controller
{
    public function index()
    {
        $about_us_info = AboutUs::query()
            ->where('id',1)
            ->first();
        return view('admin.about_us.index',compact('about_us_info'));
    }
    public  function update(Request $request , $id){
        $input = $request->all();

        $about_info = AboutUs::query()
            ->where('id', $id)
            ->findOrFail($id);

        if ($request->has('about_image')) {
            //get post image and delete old profile
            $old = $about_info->about_image;
            if (file_exists($old) and !is_dir($old)) {
                unlink($old);
            }

            $file = $request->file('about_image');
            $file_ext = $file->getClientOriginalExtension();
            $file_name = 'about_image_' . time() . '.' . $file_ext;
            $about_image = $file->move('site/assets/about_images', $file_name);

            $about_info->update([
                'about_image' => RepairFileSrc::rapair_file_src($about_image),
            ]);
        }
        if ($request->has('about_first_user_image')) {
            //get post image and delete old profile
            $old = $about_info->about_first_user_image;
            if (file_exists($old) and !is_dir($old)) {
                unlink($old);
            }

            $file = $request->file('about_first_user_image');
            $file_ext = $file->getClientOriginalExtension();
            $file_name = 'about_first_user_' . time() . '.' . $file_ext;
            $about_first_user_image = $file->move('site/assets/about_images', $file_name);

            $about_info->update([
                'about_first_user_image' => RepairFileSrc::rapair_file_src($about_first_user_image),
            ]);
        }
        if ($request->has('about_second_user_image')) {
            //get post image and delete old profile
            $old = $about_info->about_second_user_image;
            if (file_exists($old) and !is_dir($old)) {
                unlink($old);
            }

            $file = $request->file('about_second_user_image');
            $file_ext = $file->getClientOriginalExtension();
            $file_name = 'about_second_user_' . time() . '.' . $file_ext;
            $about_second_user_image = $file->move('site/assets/about_images', $file_name);

            $about_info->update([
                'about_second_user_image' => RepairFileSrc::rapair_file_src($about_second_user_image),
            ]);
        }
        if ($request->has('about_third_user_image')) {
            //get post image and delete old profile
            $old = $about_info->about_third_user_image;
            if (file_exists($old) and !is_dir($old)) {
                unlink($old);
            }

            $file = $request->file('about_third_user_image');
            $file_ext = $file->getClientOriginalExtension();
            $file_name = 'about_third_user_' . time() . '.' . $file_ext;
            $about_third_user_image = $file->move('site/assets/about_images', $file_name);

            $about_info->update([
                'about_third_user_image' => RepairFileSrc::rapair_file_src($about_third_user_image),
            ]);
        }
        if ($request->has('about_fourth_user_image')) {
            //get post image and delete old profile
            $old = $about_info->about_fourth_user_image;
            if (file_exists($old) and !is_dir($old)) {
                unlink($old);
            }

            $file = $request->file('about_fourth_user_image');
            $file_ext = $file->getClientOriginalExtension();
            $file_name = 'about_third_user_' . time() . '.' . $file_ext;
            $about_fourth_user_image = $file->move('site/assets/about_images', $file_name);

            $about_info->update([
                'about_fourth_user_image' => RepairFileSrc::rapair_file_src($about_fourth_user_image),
            ]);
        }
        $about_info->update([
            'about_title' => $input['about_title'],
            'about_sub_title' => $input['about_sub_title'],
            'description' => $input['description'],
            'about_first_user_name' => $input['about_first_user_name'],
            'about_first_user_education' => $input['about_first_user_education'],
            'about_second_user_name' => $input['about_second_user_name'],
            'about_second_user_education' => $input['about_second_user_education'],
            'about_third_user_name' => $input['about_third_user_name'],
            'about_third_user_education' => $input['about_third_user_education'],
            'about_fourth_user_name' => $input['about_fourth_user_name'],
            'about_fourth_user_education' => $input['about_fourth_user_education'],
        ]);

        alert()->success('','اطلاعات درباره ما با موفقیت ویرایش شد');
        return redirect()->route('admin.about_us_panel');
    }
}
