<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PageController extends Controller
{
    public function home()
    {
        // return view('user.home');
        $jsonPath = public_path('jnv_schools.json');
        $jnvSchools = json_decode(File::get($jsonPath), true);

        return view('user.register', compact('jnvSchools'));
    }

    public function showMAANimageGenerate()
    {
        return view('user.imageGenerate');
    }

    public function aboutUs()
    {
        return view('user.about-us');
    }

    public function contactUs()
    {
        return view('user.contact-us');
    }

    public function subscribe()
    {
        return view('user.subscribe');
    }
}
