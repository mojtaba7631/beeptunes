<?php

namespace App\Http\Controllers\admin\five_factors;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class adminFiveFactorController extends Controller
{
    public function index()
    {
        $five_factor_info = Question::query()
            ->paginate(10);
        return view('admin.five_factors.index',compact('five_factor_info'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validation = Validator::make($input, [
            'question' => 'required|string|max:500',
            'character' => 'required',
        ]);
        if ($validation->fails()) {
            alert()->error($validation->errors()->first(), 'خطا !');
            return back()->withErrors($validation->errors())->withInput();
        }
        Question::query()->create([
           'question' => $input['question'],
           'character' => $input['character'],
        ]);

        alert()->success('','سوال با موفقیت افزوده شد');
        return back();

    }

    public function update(Request $request , $five_factor_id)
    {
        $input = $request->all();

        $five_factor_info = Question::query()
            ->where('id' , $five_factor_id)
            ->first();

        $validation = Validator::make($input, [
            'name' => 'required|string|max:500',
            'character' => 'required',
        ]);
        if ($validation->fails()) {
            alert()->error($validation->errors()->first(), 'خطا !');
            return back()->withErrors($validation->errors())->withInput();
        }
        $five_factor_info->update([
            'question' => $input['name'],
            'character' => $input['character'],
        ]);

        alert()->success('','سوال با موفقیت ویرایش شد');
        return back();

    }

    public function delete($five_factor_id){
        $five_factor_info = Question::query()
            ->where('id' , $five_factor_id)
            ->first();

        $five_factor_info->delete();

        alert()->success('','سوال با موفقیت حذف شد');
        return back();


    }


}
