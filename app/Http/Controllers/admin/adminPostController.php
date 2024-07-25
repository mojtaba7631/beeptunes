<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryPost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class adminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts = Post::query()
            ->paginate(15);

        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::query()
            ->where('for_post', 1)
            ->get();

        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validation = Validator::make($input, [
            'post_title' => 'required|string|max:255',
            'post_nickname' => 'required|string|max:255',
            'post_image' => 'required|mimes:png,jpg,jpeg|max:255',
            'post_content' => 'required|string|max:50000',
            'post_meta_keywords' => 'required|string|max:255',
            'post_meta_description' => 'required|string|max:255',
            'categories' => 'required|array',
        ]);

        if ($validation->fails()) {
            alert()->error($validation->errors()->first(), 'خطا !');
            return back()->withErrors($validation->errors())->withInput();
        }

        $file = $request->file('post_image');
        $file_ext = $file->getClientOriginalExtension();
        $file_name = 'post_' . time() . '.' . $file_ext;
        $post_image = $file->move('site\assets\post_images', $file_name);

        $post = Post::create([
            'post_title' => $input['post_title'],
            'post_nickname' => str_replace(' ', '-', $input['post_nickname']),
            'post_content' => $input['post_content'],
            'post_meta_keywords' => $input['post_meta_keywords'],
            'post_meta_description' => $input['post_meta_description'],
            'post_image' => $this->repair_file_src($post_image),
        ]);

        CategoryPost::query()->create([
            'category_id' => 1,
            'post_id' => $post['id']
        ]);

//        $categories = Category::query()->findMany($input['categories']);
//        $post->categories()->attach($categories);

        alert()->success('','مقاله با موفقیت افزوده شد');
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $post_info = Post::query()->findOrFail($id);
        if (file_exists($post_info['post_image']) and !is_dir($post_info['post_image'])) {
            $post_info['post_image'] = asset($post_info['post_image']);
        } else {
            $post_info['post_image'] = asset('admin/assets/images/placeholders/img_placeholder.png');
        }

//        $selected_categories = $post_info->categories;

        $categories = Category::query()
            ->where('for_post', 1)
            ->get();

        return view('admin.post.show', compact('post_info', 'categories'));
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $post = Post::query()
            ->where('id', $id)
            ->findOrFail($id);

        $validation = Validator::make($input, [
            'post_title' => 'required|string|max:255',
            'post_nickname' => 'required|string|max:255',
            'post_image' => 'required|mimes:png,jpg,jpeg|max:255',
            'post_content' => 'required|string|max:50000',
            'post_meta_keywords' => 'required|string|max:255',
            'post_meta_description' => 'required|string|max:255',
//            'categories' => 'required|array',
        ]);

        if ($validation->fails()) {
            alert()->error($validation->errors()->first(), 'خطا !');
            return back()->withErrors($validation->errors())->withInput();
        }

        if ($request->has('post_image')) {
            //get post image and delete old profile
            $old = $post->post_image;
            if (file_exists($old) and !is_dir($old)) {
                unlink($old);
            }

            $file = $request->file('post_image');
            $file_ext = $file->getClientOriginalExtension();
            $file_name = 'post_' . time() . '.' . $file_ext;
            $post_image = $file->move('site\assets\post_images', $file_name);

            $post->update([
                'post_image' => $this->repair_file_src($post_image),
            ]);
        }

        $post->update([
            'post_title' => $input['post_title'],
            'post_nickname' => str_replace(' ', '-', $input['post_nickname']),
            'post_content' => $input['post_content'],
            'post_meta_keywords' => $input['post_meta_keywords'],
            'post_meta_description' => $input['post_meta_description'],
        ]);

//        $categories = Category::query()->findMany($input['categories']);
//        $post->categories()->sync($categories);

        alert()->success('','مقاله با موفقیت ویرایش شد');
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $post = Post::query()->findOrFail($id);

        $old = $post->post_image;
        if (file_exists($old) and !is_dir($old)) {
            unlink($old);
        }

        $post->delete();

        return redirect()->route('admin.posts.index');
    }

    function repair_file_src($src)
    {
        return str_replace('\\', '/', $src);
    }
}
