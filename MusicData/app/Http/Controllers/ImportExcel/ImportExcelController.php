<?php

namespace App\Http\Controllers\ImportExcel;

use App\Album;
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
        $album = Album::orderBy('created_at', 'ASC')->get();
        return view('import_excel.index', compact('album'));
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
