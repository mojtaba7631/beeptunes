<?php

namespace App\Http\Controllers\admin\albums;

use App\Helper\RepairFileSrc;
use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class adminAlbumController extends Controller
{
    public function index()
    {
        $album_info = Album::query()
            ->paginate(15);

        return view('admin.albums.index', compact('album_info'));
    }

    public function create()
    {
        $categories = Category::query()
            ->where('for_product', 1)
            ->get();

        return view('admin.albums.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validation = Validator::make($input, [
            'album_title' => 'required|string|max:255',
            'album_nickname' => 'required|string|max:255',
            'album_image' => 'required|mimes:png,jpg,jpeg|max:255',
            'album_content' => 'required|string',
            'album_meta_keywords' => 'required|string|max:255',
            'album_meta_description' => 'required|string|max:255',
            'category' => 'required',
        ]);

        if ($validation->fails()) {
            alert()->error($validation->errors()->first());
            return back()->withErrors($validation->errors())->withInput();
        }

        $file = $request->file('album_image');
        $file_ext = $file->getClientOriginalExtension();
        $file_name = 'album_' . time() . '.' . $file_ext;
        $album_image = $file->move('site\assets\album_images', $file_name);

        Album::query()->create([
            'album_title' => $input['album_title'],
            'album_nickname' => str_replace(' ', '-', $input['album_nickname']),
            'album_content' => $input['album_content'],
            'album_meta_keywords' => $input['album_meta_keywords'],
            'album_guidance_permit' => $input['album_guidance_permit'],
            'album_meta_description' => $input['album_meta_description'],
            'album_author' => $input['album_author'],
            'price' => $input['price'],
            'category_album' => $input['category'],
            'album_national_library_code' => $input['album_national_library_code'],
            'album_image' => RepairFileSrc::rapair_file_src($album_image),
            'album_type' => $input['album_type']
        ]);

        alert()->success('', 'آلبوم با موفقیت افزوده شد');
        return redirect()->route('admin.album_panel');

    }

    public function edit($album_id){
        $album_info = Album::query()
            ->where('id' , $album_id)
            ->first();

        $categories = Category::query()
            ->where('for_product', 1)
            ->get();

        return view('admin.albums.edit',compact('album_info','categories'));

    }

    public function update(Request $request , $album_id)
    {
        $input = $request->all();


        $album_info = Album::query()
            ->where('id' , $album_id)
            ->first();


        if ($request->has('album_image')) {
            //get post image and delete old profile
            $old = $album_info->album_image;
            if (file_exists($old) and !is_dir($old)) {
                unlink($old);
            }

            $file = $request->file('album_image');
            $file_ext = $file->getClientOriginalExtension();
            $file_name = 'album_' . time() . '.' . $file_ext;
            $album_image = $file->move('site\assets\album_images', $file_name);

            $album_info->update([
                'album_image' => RepairFileSrc::rapair_file_src($album_image),
            ]);
        }

        $album_info->update([
            'album_title' => $input['album_title'],
            'album_nickname' => str_replace(' ', '-', $input['album_nickname']),
            'album_content' => $input['album_content'],
            'album_meta_keywords' => $input['album_meta_keywords'],
            'album_guidance_permit' => $input['album_guidance_permit'],
            'album_meta_description' => $input['album_meta_description'],
            'album_author' => $input['album_author'],
            'price' => $input['price'],
            'category_album' => $input['category'],
            'album_national_library_code' => $input['album_national_library_code'],
            'album_type' => $input['album_type']
        ]);

        alert()->success('', 'آلبوم با موفقیت ویرایش شد');
        return redirect()->route('admin.album_panel');

    }

    public function destroy($album_id)
    {
        $album_info = Album::query()->findOrFail($album_id);

        $old = $album_info->album_image;
        if (file_exists($old) and !is_dir($old)) {
            unlink($old);
        }

        $album_info->delete();

        return redirect()->route('admin.album_panel');
    }

    public function cat_album()
    {
        $categories = Category::query()
            ->where('for_product', 1)
            ->paginate();

        return view('admin.albums.cat_index', compact('categories'));
    }

    public function cat_album_store(Request $request)
    {
        $input = $request->all();

        $validation = Validator::make($input, [
            'cat_title' => 'required|string',
        ]);

        if ($validation->fails()) {
            alert()->error($validation->errors()->first());
            return back()->withErrors($validation->errors())->withInput();
        }

        Category::query()->create([
            'cat_title' => $input['cat_title'],
            'for_product' => 1,
            'for_post' => 0,
        ]);
        alert()->success('', 'دسته مورد نظر با موفقیت افزوده شد');
        return back();
    }

    public function cat_album_update(Request $request, $cat_album_id)
    {
        $input = $request->all();

        $cat_album_info = Category::query()
            ->where('id', $cat_album_id)
            ->first();

        $cat_album_info->update([
            'cat_title' => $input['cat_title'],
            'for_product' => 1
        ]);

        alert()->success('', 'دسته مورد نظر ویرایش شد');
        return back();

    }

    public function delete($cat_album_id)
    {
        $cat_album_info = Category::query()
            ->where('id', $cat_album_id)
            ->first();

        $cat_album_info->delete();

        alert()->success('', 'دسته مورد نظر حذف شد');
        return back();
    }
}
