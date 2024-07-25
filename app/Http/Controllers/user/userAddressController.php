<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class userAddressController extends Controller
{
    public function index(){}

    public function create(){}

    public function store(Request $request){
        $input = $request->all();

        $validation = Validator::make($input, [
            'address_title' => 'required|string|max:255',
            'address' => 'required|string|max:2000',
        ]);

        if ($validation->fails()) {
            alert()->error('', $validation->errors()->first());
            return back();
        }

        Address::query()->create([
            'user_id' => auth()->id(),
            'address_title' => $input['address_title'],
            'address' => $input['address'],
        ]);

        alert()->success('', 'آدرس شما با موفقیت افزوده شد');
        return back();

    }
}
