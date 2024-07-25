<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class adminPostCategories extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::query()
            ->where('for_post', 1)
            ->paginate(15);

        return view('admin.post.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validation = Validator::make($input, [
            'cat_name' => 'required|string|max:255'
        ]);

        if ($validation->fails()) {
            alert()->error($validation->errors()->first(), 'خطا !');
            return back()->withErrors($validation->errors())->withInput();
        }

        Category::create([
            'cat_title' => $input['cat_name'],
            'for_post' => 1,
        ]);


        alert()->success('دسته بندی با موفقیت افزوده شد.', 'با تشکر');
        return redirect()->route('admin.post_category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category_info = Category::query()->findOrFail($id);
        return view('admin.post.category.show', compact('category_info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category_info = Category::query()->findOrFail($id);

        $input = $request->all();
        $validation = Validator::make($input, [
            'cat_name' => 'required|string|max:255'
        ]);

        if ($validation->fails()) {
            alert()->error($validation->errors()->first(), 'خطا !');
            return back()->withErrors($validation->errors())->withInput();
        }

        $category_info->update([
            'cat_title' => $input['cat_name']
        ]);

        alert()->success('دسته بندی با موفقیت افزوده شد.', 'با تشکر');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category_info = Category::query()->findOrFail($id);
        $category_info->delete();

        alert()->success('دسته بندی با موفقیت حذف شد.', 'با تشکر');
        return back();
    }
}
