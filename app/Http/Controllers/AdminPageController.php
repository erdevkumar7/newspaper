<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPageController extends Controller
{
    public function allPage()
    {
        $allpages = DB::table('pages')->orderBy('created_at', 'desc')->get();
        return view('admin-page.all-page', compact('allpages'));
    }

    public function viewPage($page_id)
    {
        $page = Page::find($page_id);
        if (!$page) {
            return redirect()->back()->with('error', 'No News-paper Found!');
        }

        return view('admin-page.view-page', compact('page'));
    }

    public function addPage()
    {
        return view('admin-page.add-page');
    }

    public function addPageSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'title' => [
                'required',
                'string',
                'min:3',
                'max:50',
                'regex:/^[\pL\s\-\.\,\!\?\&\(\)]+$/u'
            ],
            'description' => 'required|min:50',
        ], [
            'title.regex' => 'The title field contains invalid characters.',
        ]);

        $page = Page::create($validatedData);
        if (!$page) {
            return redirect()->back()->with('error', 'Failed to create the page. Please try again.');
        }

        return redirect()->route('admin.allpage')->with('success', 'Page created successfully');
    }

    public function editPage($page_id)
    {
        $page = Page::find($page_id);
        if (!$page) {
            return redirect()->back()->with('error', 'No News-paper Found!');
        }

        return view('admin-page.edit-page', compact('page'));
    }

    public function updatePage(Request $request, $page_id)
    {
        $page = Page::find($page_id);
        if (!$page) {
            return redirect()->back()->with('error', 'No News-paper Found!');
        }

        $validatedData = $request->validate([
            'title' => [
                'required',
                'string',
                'min:3',
                'max:50',
                'regex:/^[\pL\s\-\.\,\!\?\&\(\)]+$/u'
            ],
            'description' => 'required|min:50',
        ], [
            'title.regex' => 'The title field contains invalid characters.',
        ]);

        $updatePage = $page->update($validatedData);
        if (!$updatePage) {
            return redirect()->back()->with('error', 'Failed to Update the page. Please try again.');
        }
        return redirect()->route('admin.allpage')->with('success', 'Page updated successfully');
    }
}
