<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function home()
    {
        $allbanner = DB::table('banners')
            ->orderBy("updated_at", "desc")
            ->get();
        return view('user.home', compact('allbanner'));
    }

    public function aboutUs()
    {
        return view('user.about-us');
    }

    public function contactUs(){
        return view('user.contact-us');
    }
}
