<?php

namespace App\Http\Controllers;

use App\Models\Newspaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminNewspaperController extends Controller
{
    public function addNewsPaper()
    {
        return view('admin-newspaper.add-newspaper');
    }

    public function addNewsPaperSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'title' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[\pL\s\-]+$/u', // Only allows letters, spaces, and hyphens
            ],
            'description' => 'required|min:20',
            'author' => [
                'required',
                'string',
                'max:70',
                'regex:/^[\pL\s]+$/u',
            ],
            'publication_date' => 'required|date',
            'pdf_upload' => 'required|file|mimes:pdf|max:2048',
        ], [
            'title.regex' => 'The title field must contain only letters, spaces, and hyphens.',
            'author.regex' => 'Author name field must contain only letters and spaces',
        ]);

        if ($request->hasFile('pdf_upload')) {
            $pdf = $request->file('pdf_upload');
            $pdfName = time() . '_' . $pdf->getClientOriginalName();
            $pdf->move(public_path('newspaper/upload_pdf'), $pdfName);
        } else {
            $pdfName = null;
        }

        $validatedData['pdf_upload'] = $pdfName;
        Newspaper::create($validatedData);

        return redirect()->route('admin.allnewspaper')->with('success', 'Newspaper created successfully');
    }



    public function allNewsPaper()
    {
        $allnewspaper = DB::table('newspapers')->orderBy('created_at', 'desc')->get();
        return view('admin-newspaper.all-newspaper', compact('allnewspaper'));
    }
}
