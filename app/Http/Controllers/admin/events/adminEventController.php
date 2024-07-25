<?php

namespace App\Http\Controllers\admin\events;

use App\Helper\ConvertDateToGregorian;
use App\Helper\ConvertDateToJalali;
use App\Http\Controllers\Controller;
use App\Models\Event;
use http\Exception\BadConversionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helper\RepairFileSrc;

class adminEventController extends Controller
{
    public function index(){
        $event_info = Event::query()
            ->paginate();

        return view('admin.events.index',compact('event_info'));
    }

    public function create(){
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validation = Validator::make($input, [
            'event_title' => 'required|string',
            'short_title' => 'required|string',
            'event_image' => 'required|mimes:png,jpg,jpeg|max:1204',
            'event_date_counter' => 'required|string',
            'event_content' => 'required|string',
        ]);

        if ($validation->fails()) {
            alert()->error($validation->errors()->first(), 'خطا !');
            return back()->withErrors($validation->errors())->withInput();
        }

        $file = $request->file('event_image');
        $file_ext = $file->getClientOriginalExtension();
        $file_name = 'event_' . time() . '.' . $file_ext;
        $event_image = $file->move('site/assets/event_images', $file_name);

        Event::create([
            'event_title' => $input['event_title'],
            'short_title' => $input['short_title'],
            'event_date_counter' => $input['event_date_counter'],
            'event_date' => ConvertDateToGregorian::convert_date_to_gregorian($input['event_date']),
            'event_content' => $input['event_content'],
            'event_meta_keywords' => $input['event_meta_keywords'],
            'event_image' => RepairFileSrc::rapair_file_src($event_image),
            'status' => 1,
            'main' => 0,
            'price' => $input['price'],
        ]);

        alert()->success('','رویداد با موفقیت افزوده شد');
        return redirect()->route('admin.events_panel');
    }

    public function main($event_id)
    {
        $event_info = Event::query()
            ->where('id' , $event_id)
            ->first();

        $event_info_main_count = Event::query()
            ->where('main' , 1)
            ->count();

        if ($event_info['main'] == 0){
            if ($event_info_main_count == 1)
            {
                alert()->success('','هم اکنون یک رویداد در صفحه اصلی فعال است ابتدا آن را غیر فعال کنید');
                return back();
            }
            else{
                $event_info->update([
                    'main' => 1
                ]);
                alert()->success('','این رویداد برای نمایش در صفحه اصلی سایت آماده شد');
                return back();
            }

        }
        else if($event_info['main'] == 1)
        {
            $event_info->update([
                'main' => 0
            ]);
            alert()->success('','این رویداد برای نمایش در صفحه اصلی غیر فعال شد');
            return back();
        }

    }

    public function edit($event_id)
    {
        $event_info = Event::query()
            ->where('id' , $event_id)
            ->first();

        $event_info_date = ConvertDateToJalali::convert_date_to_jalali($event_info['event_date']);


        return view('admin.events.edit',compact('event_info','event_info_date'));

    }

    public function update(Request $request , $event_id)
    {
        $input = $request->all();

        $event_info = Event::query()
            ->where('id' , $event_id)
            ->first();

        $validation = Validator::make($input, [
            'event_title' => 'required|string',
            'short_title' => 'required|string',
            'event_image' => 'required|mimes:png,jpg,jpeg|max:1204',
            'event_date_counter' => 'required|string',
            'event_content' => 'required|string',
        ]);

        if ($validation->fails()) {
            alert()->error($validation->errors()->first(), 'خطا !');
            return back()->withErrors($validation->errors())->withInput();
        }

        if ($request->has('event_image')) {
            //get post image and delete old profile
            $old = $event_info->event_image;
            if (file_exists($old) and !is_dir($old)) {
                unlink($old);
            }

            $file = $request->file('event_image');
            $file_ext = $file->getClientOriginalExtension();
            $file_name = 'event_' . time() . '.' . $file_ext;
            $event_image = $file->move('site\assets\event_image', $file_name);

            $event_info->update([
                'event_image' => RepairFileSrc::rapair_file_src($event_image),
            ]);
        }

        $event_info->update([
            'event_title' => $input['event_title'],
            'short_title' => $input['short_title'],
            'event_date_counter' => $input['event_date_counter'],
            'event_date' => ConvertDateToGregorian::convert_date_to_gregorian($input['event_date']),
            'event_content' => $input['event_content'],
            'event_meta_keywords' => $input['event_meta_keywords'],
            'price' => $input['price'],
        ]);

        alert()->success('','رویداد با موفقیت ویرایش شد');
        return redirect()->route('admin.events_panel');

    }

    public function delete($event_id){
        $event_info = Event::query()
            ->where('id' , $event_id)
            ->first();

        $old = $event_info->event_image;
        if (file_exists($old) and !is_dir($old)) {
            unlink($old);
        }

        $event_info->delete();

        alert()->success('','رویداد با موفقیت حذف شد');
        return redirect()->route('admin.events_panel');
    }
}
