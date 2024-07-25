<?php

namespace App\Http\Controllers\admin\tests;

use App\Helper\RepairFileSrc;
use App\Http\Controllers\Controller;
use App\Models\MainTest;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class adminTestController extends Controller
{
    public function index()
    {
        $tests_info = Test::query()
            ->paginate(10);

        return view('admin.tests.index', compact('tests_info'));
    }

    public function create()
    {
        $main_test = MainTest::query()
            ->get();

        return view('admin.tests.create',compact('main_test'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validation = Validator::make($input, [
            'test_name' => 'required|string|max:255',
            'test_slug' => 'required|string|max:255',
            'main_test' => 'required',
            'test_image' => 'required|mimes:png,jpg,jpeg|max:1024',
            'test_description' => 'required|string|max:50000',
            'test_meta_keywords' => 'required|string|max:255',
            'test_meta_description' => 'required|string|max:255',
        ]);

        if ($validation->fails()) {
            alert()->error($validation->errors()->first(), 'خطا !');
            return back()->withErrors($validation->errors())->withInput();
        }

        $file = $request->file('test_image');
        $file_ext = $file->getClientOriginalExtension();
        $file_name = 'test_' . time() . '.' . $file_ext;
        $test_image = $file->move('site\assets\test_images', $file_name);

        Test::query()->create([
            'test_name' => $input['test_name'],
            'test_image' => RepairFileSrc::rapair_file_src($test_image),
            'test_slug' => str_replace(' ', '-', $input['test_slug']),
            'test_meta_keywords' => $input['test_meta_keywords'],
            'test_meta_description' => $input['test_meta_description'],
            'test_description' => $input['test_description'],
            'main_test' => $input['main_test'],
        ]);

        alert()->success('', 'آزمون با موفقیت افزوده شد');
        return redirect()->route('admin.test_panel');
    }

    public function edit($test_id)
    {
        $test_info = Test::query()->findOrFail($test_id);
        if (file_exists($test_info['test_image']) and !is_dir($test_info['test_image'])) {
            $test_info['test_image'] = asset($test_info['test_image']);
        } else {
            $test_info['test_image'] = asset('admin/assets/images/placeholders/img_placeholder.png');
        }
        $main_test = MainTest::query()
            ->get();
        return view('admin.tests.edit', compact('test_info','main_test'));
    }

    public function update(Request $request, $test_id)
    {
        $input = $request->all();

        $test_info = Test::query()
            ->where('id', $test_id)
            ->findOrFail($test_id);

        $validation = Validator::make($input, [
            'test_name' => 'required|string|max:255',
            'test_slug' => 'required|string|max:255',
            'main_test' => 'required',
            'test_description' => 'required|string|max:50000',
            'test_meta_keywords' => 'required|string|max:255',
            'test_meta_description' => 'required|string|max:255',
        ]);

        if ($validation->fails()) {
            alert()->error($validation->errors()->first(), 'خطا !');
            return back()->withErrors($validation->errors())->withInput();
        }

        if ($request->has('test_image')) {
            //get post image and delete old profile
            $old = $test_info->test_image;
            if (file_exists($old) and !is_dir($old)) {
                unlink($old);
            }

            $file = $request->file('test_image');
            $file_ext = $file->getClientOriginalExtension();
            $file_name = 'test_' . time() . '.' . $file_ext;
            $test_image = $file->move('site\assets\test_images', $file_name);

            $test_info->update([
                'test_image' => RepairFileSrc::rapair_file_src($test_image),
            ]);
        }

        $test_info->update([
            'test_name' => $input['test_name'],
            'test_slug' => str_replace(' ', '-', $input['test_slug']),
            'test_description' => $input['test_description'],
            'test_meta_keywords' => $input['test_meta_keywords'],
            'test_meta_description' => $input['test_meta_description'],
            'main_test' => $input['main_test'],
        ]);

//        $categories = Category::query()->findMany($input['categories']);
//        $post->categories()->sync($categories);

        alert()->success('','آزمون با موفقیت ویرایش شد');
        return redirect()->route('admin.test_panel');
    }

    public function destroy($id)
    {
        $test_info = Test::query()->findOrFail($id);

        $old = $test_info->test_image;
        if (file_exists($old) and !is_dir($old)) {
            unlink($old);
        }

        $test_info->delete();

        return redirect()->route('admin.test_panel');
    }
}
