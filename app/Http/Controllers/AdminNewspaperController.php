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

    public function viewNewsPaper($paper_id)
    {
        $paper = Newspaper::find($paper_id);
        if (!$paper) {
            return redirect()->back()->with('error', 'No News-paper Found!');
        }
        return view('admin-newspaper.view-newspaper', compact('paper'));
    }

    public function editNewsPaper($paper_id)
    {
        $paper = Newspaper::find($paper_id);
        if (!$paper) {
            return redirect()->back()->with('error', 'No News-paper Found!');
        }
        return view('admin-newspaper.edit-newspaper', compact('paper'));
    }

    public function editNewsPaperSubmit(Request $request, $paper_id)
    {
        $paper = Newspaper::find($paper_id);
        if (!$paper) {
            return redirect()->back()->with('error', 'No News-paper Found!');
        }

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
            'pdf_upload' => 'nullable|file|mimes:pdf|max:2048',
        ], [
            'title.regex' => 'The title field must contain only letters, spaces, and hyphens.',
            'author.regex' => 'Author name field must contain only letters and spaces',
        ]);

        if ($request->hasFile('pdf_upload')) {
            if ($paper->pdf_upload) {
                $oldPaperPath = public_path('newspaper/upload_pdf') . '/' . $paper->pdf_upload;
                if (file_exists($oldPaperPath)) {
                    unlink($oldPaperPath);
                }
            }
            $pdf = $request->file('pdf_upload');
            $pdfName = time() . '_' . $pdf->getClientOriginalName();
            $pdf->move(public_path('newspaper/upload_pdf'), $pdfName);
            $validatedData['pdf_upload'] = $pdfName;
        }

        $paper->update($validatedData);
        return redirect()->route('admin.allnewspaper')->with('success', 'Newspaper updated successfully');
    }

    public function deleteNeswPaper(Request $request)
    {
        $request->validate([
            'paper_id' => 'required|exists:newspapers,id'
        ]);
        $paper = Newspaper::find($request->paper_id);
        if ($paper) {
            if ($paper->pdf_upload) {
                $oldPaperPath = public_path('newspaper/upload_pdf') . '/' . $paper->pdf_upload;
                if (file_exists($oldPaperPath)) {
                    unlink($oldPaperPath);
                }
            }
            $paper->delete();
            return response()->json(['success' => true, 'message' => 'News-paper deleted successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'News-paper not found.']);
    }

    public function downloadPDF($paper_id)
    {
        $paper = Newspaper::findOrFail($paper_id);
        $pdfPath = public_path('newspaper/upload_pdf/' . $paper->pdf_upload);

        if (file_exists($pdfPath)) {
            return response()->download($pdfPath);
        } else {
            return redirect()->back()->with('error', 'PDF not found.');
        }
    }
}
