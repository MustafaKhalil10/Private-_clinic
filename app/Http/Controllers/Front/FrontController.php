<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class FrontController extends Controller
{


    public function home() // -> front_home
    {
        $contact = Setting::find(1);
        return view('front.home', ['contact' => $contact]);
    }

    public function services() // -> front_services
    {
        $contact = Setting::find(1);
        return view('front.services', ['contact' => $contact]);
    }

    public function doctor() // -> front_doctor
    {
        $contact = Setting::find(1);
        return view('front.doctor', ['contact' => $contact]);
    }

    public function contact() // -> front_contact
    {
        $contact = Setting::find(1);
        return view('front.contact', ['contact' => $contact]);
    }

}
