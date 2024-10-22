<?php

namespace App\Http\Controllers;

use App\Models\Newspaper;
use Illuminate\Http\Request;

class AdminNewspaperController extends Controller
{
    public function addNewsPaper()
    {
        return view('admin-newspaper.add-newspaper');
    }

    public function addNewsPaperSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|min:20',
            'author' => [
                'required',
                'string',
                'max:70',
                'regex:/^[\pL\s\-]+$/u',
            ],
            'publication_date' => 'required',
            'pdf_upload' => 'required|file|mimes:pdf|max:2048',
        ]);

        // Handle file upload
        // if ($request->hasFile('pdf_upload')) {
        //     $pdfPath = $request->file('pdf_upload')->store('pdfs', 'public'); // Store the PDF in the 'storage/app/public/pdfs' directory
        // }
        if ($request->hasFile('pdf_upload')) {
            $pdf = $request->file('pdf_upload');
            $pdfName = time() . '_' . $pdf->getClientOriginalName();
            $pdf->move(public_path('newspaper/upload_pdf'), $pdfName);
        } else {
            $pdfName = null;
        }

        $validatedData['pdf_upload'] = $pdfName;
        Newspaper::create($validatedData);

        return redirect()->route('admin.dashboard')->with('success', 'Newspaper created successfully');
    }
}
