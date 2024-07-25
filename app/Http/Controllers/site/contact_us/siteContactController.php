<?php

namespace App\Http\Controllers\site\contact_us;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class siteContactController extends Controller
{
    public function index()
    {
        $contact_us = ContactUs::query()
            ->first();

        return view('site.contact_us.index',compact('contact_us'));
    }
}
