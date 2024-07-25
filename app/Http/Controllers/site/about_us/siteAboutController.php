<?php

namespace App\Http\Controllers\site\about_us;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class siteAboutController extends Controller
{
    public function index()
    {
        $about_info = AboutUs::query()
            ->first();
        return view('site.about_us.index',compact('about_info'));
    }
}
