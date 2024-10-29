<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function indexPage()
    {
        $page = Page::where('title', 'Home')->first();        
        return view('user.index', compact('page'));
    }
}
