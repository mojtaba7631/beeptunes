<?php

namespace App\Http\Controllers\admin\messages;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class adminMessageController extends Controller
{
    public function index(){
        $message_info = Message::query()
            ->paginate(10);

        return view('admin.messages.index',compact('message_info'));
    }

    public function store(Request $request){

        $input = $request->all();

        Message::query()->create([
            'message_name' => $input['message_name'] ,
            'message_mobile' => $input['message_mobile'] ,
            'message_subject' => $input['message_subject'] ,
            'message_description' => $input['message_description'] ,
        ]);

        alert()->success('','پیغام شما ثبت گردید');
        return redirect()->route('home');
    }
}
