<?php

namespace App\Http\Controllers\ImportExcel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\ImportMusic;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use App\Music;

class ImportExcelController extends Controller
{
    //
    public function index()
    {
        $contacts = Music::orderBy('created_at', 'DESC')->get();
        return view('import_excel.index', compact('music'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);
        Excel::import(new ImportMusic, request()->file('import_file'));
        return back()->with('success', 'Contacts imported successfully.');
    }
}
