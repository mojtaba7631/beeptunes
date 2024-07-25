<?php

namespace App\Http\Controllers\admin\contact_us;

use App\Helper\RepairFileSrc;
use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class adminContactController extends Controller
{
    public function index()
    {
        $contact_info = ContactUs::query()
            ->first();
        return view('admin.contact_us.index',compact('contact_info'));
    }

    public function update(Request $request,$id)
    {
        $input = $request->all();

        $contact_info = ContactUs::query()
            ->where('id', $id)
            ->findOrFail($id);


        $contact_info->update([
            'work_time' => $input['work_time'],
            'address' => $input['address'],
            'phone1' => $input['phone1'],
            'phone2' => $input['phone2'],
        ]);

        alert()->success('','اطلاعات تماس با ما با موفقیت ویرایش شد');
        return redirect()->route('admin.contact_us_panel');
    }
}
