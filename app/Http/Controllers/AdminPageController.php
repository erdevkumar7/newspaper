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
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg,jfif|max:10240',
            'logo_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,jfif|max:2048',
            'description' => 'required|min:50',
        ], [
            'title.regex' => 'The title field contains invalid characters.',
        ]);

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $imgName = time() . '_' . $img->getClientOriginalName();
            $img->move(public_path('images/static_img'), $imgName);
            $validatedData['images'] = $imgName;
        }

        if ($request->hasFile('logo_img')) {
            $img = $request->file('logo_img');
            $imgName = time() . '_' . $img->getClientOriginalName();
            $img->move(public_path('images/static_img'), $imgName);
            $validatedData['logo_img'] = $imgName;
        }

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
            // 'title' => [
            //     'required',
            //     'string',
            //     'min:3',
            //     'max:50',
            //     'regex:/^[\pL\s\-\.\,\!\?\&\(\)]+$/u'
            // ],
            'description' => 'required|min:50',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg,jfif|max:10240',
            'logo_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,jfif|max:2048',
        ], [
            'title.regex' => 'The title field contains invalid characters.',
        ]);

       

        if ($request->hasFile('image')) {
            if ($page->images) {
                $oldPaperPath = public_path('images/static_img') . '/' . $page->images;
                if (file_exists($oldPaperPath)) {
                    unlink($oldPaperPath);
                }
            }
            $img = $request->file('image');
            $imgName = time() . '_' . $img->getClientOriginalName();
            $img->move(public_path('images/static_img'), $imgName);
            $validatedData['images'] = $imgName;
        }

        if ($request->hasFile('logo_img')) {
            if ($page->logo_img) {
                $oldPaperPath = public_path('images/static_img') . '/' . $page->logo_img;
                if (file_exists($oldPaperPath)) {
                    unlink($oldPaperPath);
                }
            }
            $img = $request->file('logo_img');
            $imgName = time() . '_' . $img->getClientOriginalName();
            $img->move(public_path('images/static_img'), $imgName);
            $validatedData['logo_img'] = $imgName;
        }

        $updatePage = $page->update($validatedData);
        if (!$updatePage) {
            return redirect()->back()->with('error', 'Failed to Update the page. Please try again.');
        }
        return redirect()->route('admin.allpage')->with('success', 'Page updated successfully');
    }

    public function updatePageStatus(Request $request)
    {
        $request->validate([
            'page_id' => 'required|exists:pages,id',
            'status' => 'required|boolean'
        ]);
        $page = Page::find($request->page_id);
        if ($page) {
            $page->status = $request->status;
            $page->save();

            return response()->json(['success' => true, 'message' => 'Status updated successfully!']);
        }
        return response()->json(['success' => false, 'message' => 'Page not found!']);
    }
}
