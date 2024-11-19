<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function home()
    {       
        return view('user.home');
    }

    public function aboutUs()
    {
        return view('user.about-us');
    }

    public function contactUs(){
        return view('user.contact-us');
    }

    public function subscribe(){
        return view('user.subscribe');
    }
}
